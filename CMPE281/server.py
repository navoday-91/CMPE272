import pymysql.cursors

from autobahn.twisted.websocket import WebSocketServerProtocol, \
    WebSocketServerFactory
from pymysql import MySQLError, ProgrammingError


class MyServerProtocol(WebSocketServerProtocol):
    liveclients = {}
    clients = {}
    i = 0
    user = ""
    db = pymysql.connect("localhost", "admin", "redhat", "cmpe281")

    # prepare a cursor object using cursor() method
    cursor = db.cursor()

    def register(self, client, payload):
        """
        Add client to list of managed connections.
        """
        if self.i == 0:
            self.user = payload.decode('utf-8').split(";")[0]
            self.liveclients[self.user] = client
            self.i += 1

        #self.clients[client.peer] = {"object": client, "partner": None}

    def unregister(self, client):
        """
        Remove client from list of managed connections.
        """
        del self.liveclients[self.user]

    group_community = ""

    def isGroup(self, sendto):
        db = pymysql.connect("localhost", "admin", "redhat", "cmpe281")

        # prepare a cursor object using cursor() method
        cursor = db.cursor()
        sql = "SELECT community FROM groups where groupname = '" + sendto +"';"
        print(sql)
        try:
            # Execute the SQL command
            #global cursor
            cursor.execute(sql)
            groupflag = False
            # Fetch all the rows in a list of lists.
            results = cursor.fetchall()
            for row in results:
                global groupflag
                groupflag = True
                global group_community
                group_community = row[2]
                return groupflag
        except MySQLError as e:
            print('Got error {!r}, errno is {}'.format(e, e.args[0]))
        except pymysql.InternalError as error:
            code, message = error.args
            print(">>>>>>>>>>>>>", code, message)
        except ProgrammingError as e:
            print("Caught a Programming Error:",)
            print(e)
        except:
            print("Error: unable to fetch data")

    def communicate(self, client, payload, isBinary):
        sendto = payload.decode('utf-8').split(";")[1]
        if self.isGroup(sendto):
            self.groupcommunicate(self, payload, isBinary)
        else:
            if sendto not in self.liveclients:
                self.sendMessage((sendto + ";" + payload.decode('utf-8').split(";")[0] + ";" +
                                 "Sorry you don't have partner yet, check back in a minute").encode('ascii'))
            else:
                c = self.liveclients[sendto]
                c.sendMessage(payload, isBinary)

    def groupcommunicate(self, client, payload, isBinary):
        sendto = payload.decode('utf-8').split(";")[1]
        recdfrom = payload.decode('utf-8').split(";")[0]
        global group_community
        tablename = sendto + group_community
        sql = "SELECT member FROM `" + tablename + "`;"
        print(sql)
        try:
            # Execute the SQL command
            global cursor
            cursor.execute(sql)
            groupflag = False
            # Fetch all the rows in a list of lists.
            results = cursor.fetchall()
            for row in results:
                if row[1] != "admin":
                    reciever = row[0]
                if reciever != recdfrom and reciever in self.liveclients:
                    c = self.liveclients[reciever]
                    print(payload)
                    c.sendMessage(payload, isBinary)
        except:
            print("Error: unable to fetch data")

    def onConnect(self, request):
        print("Client connecting: {0}".format(request.peer))
        self.i = 0
        #self.register(self)
        #self.findPartner(self)

    def onOpen(self):
        print("WebSocket connection open.")

    def onMessage(self, payload, isBinary):
        if self.i == 0:
            self.register(self, payload)
        else:
            self.communicate(self,payload,isBinary)
        #self.sendMessage(payload, isBinary)

    def onClose(self, wasClean, code, reason):
        print("WebSocket connection closed: {0}".format(reason))
        self.unregister(self)


if __name__ == '__main__':

    import sys

    from twisted.python import log
    from twisted.internet import reactor

    log.startLogging(sys.stdout)
    factory = WebSocketServerFactory(u"ws://127.0.0.1:9000")
    factory.protocol = MyServerProtocol
    # factory.setProtocolOptions(maxConnections=2)

    # note to self: if using putChild, the child must be bytes...

    reactor.listenTCP(9000, factory)
    reactor.run()