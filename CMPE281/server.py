import pymysql.cursors

from autobahn.twisted.websocket import WebSocketServerProtocol, \
    WebSocketServerFactory


class MyServerProtocol(WebSocketServerProtocol):
    liveclients = {}
    clients = {}
    i = 0
    user = ""
    db = pymysql.connect("localhost", "admin", "redhat", "cmpe281")

    # prepare a cursor object using cursor() method
    cursor = db.cursor()

    sql = "SELECT * FROM login;"
    try:
        # Execute the SQL command
        cursor.execute(sql)
        # Fetch all the rows in a list of lists.
        results = cursor.fetchall()
        for row in results:
            print(row[1])
    except:
        print("Error: unable to fetch data")

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

    def findPartner(self, client):
        print("")

    def communicate(self, client, payload, isBinary):
        sendto = payload.decode('utf-8').split(";")[1]
        if sendto not in self.liveclients:
            self.sendMessage((sendto + ";" + payload.decode('utf-8').split(";")[0] + ";" +
                             "Sorry you don't have partner yet, check back in a minute").encode('ascii'))
        else:
            c = self.liveclients[sendto]
            c.sendMessage(payload, isBinary)

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