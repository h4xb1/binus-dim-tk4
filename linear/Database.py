
import mysql.connector
from Config import Config

class Database:
    def __init__(
            self, host = Config.DB_HOST,
            port = Config.DB_PORT,
            user = Config.DB_USER,
            password = Config.DB_PASS,
            database = Config.DB_NAME
        ) -> None:
        self.host = host
        self.port = port
        self.user = user
        self.password = password
        self.database = database

    def connect(self) -> None:
        self.mydb = mysql.connector.connect(
            host=self.host,
            port=self.port,
            user=self.user,
            password=self.password,
            database=self.database
        )
        self.mycursor = self.mydb.cursor(buffered=True)

    def close(self) -> None:
        self.mydb.close()

    def execute(self, query, values=None):
        self.connect()
        self.mycursor.execute(query, values)
        self.mydb.commit()
        column = [column[0] for column in self.mycursor.description]
        data = self.mycursor.fetchall()
        result = []
        for row in data:
            result.append(dict(zip(column, row)))
        self.close()
        return result
