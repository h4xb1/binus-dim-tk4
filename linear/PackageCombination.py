from pulp import LpProblem, LpMaximize, LpVariable, lpSum, LpStatus, value, PULP_CBC_CMD
from Database import Database as DB

class PackageCombination:

    def __init__(self) -> None:
        self.db = DB()
        self.matrix = list()
        self.model = None
        self.x = None
        pass

    # Mengambil data barang dari database
    def GetDataBarang(self) -> list:
        query = """
            SELECT IdBarang, NamaBarang, Satuan as HargaSatuan, JumlahMinimal, JumlahMaksimal, Stok FROM Barang;
        """
        result = self.db.execute(query)
        for i in range(len(result)):
            result[i]['HargaSatuan'] = int(result[i]['HargaSatuan'])
        return result
    
    # Membuat matrix
    def SetMatrix(self) -> None:
        self.matrix = self.GetDataBarang()        
        return None
    
    # Membuat model sebagai LpProblem dengan tujuan maksimisasi keuntungan
    def InitModel(self) -> None:
        self.model = LpProblem("Paket_penjualan_barang", LpMaximize)
        return None
    
    # Membuat dictionary untuk menyimpan variabel LP
    # Setiap variabel merepresentasikan jumlah barang yang diambil untuk paket penjualan
    def InitVariable(self) -> None:
        self.x = LpVariable.dicts("x", [item['IdBarang'] for item in self.matrix], lowBound=0, cat='Integer')
        return None
    
    # Menentukan fungsi tujuan
    def SetObjective(self) -> None:
        self.model += lpSum([self.matrix[i]['HargaSatuan'] * self.x[item['IdBarang']] for i, item in enumerate(self.matrix)]), "Keuntungan"

    # Menentukan batasan-batasan
    def SetConstraint(self) -> None:
        for i in range(len(self.matrix)):
            self.model += self.x[self.matrix[i]['IdBarang']] >= self.matrix[i]['JumlahMinimal'], f"Min Barang {self.matrix[i]['NamaBarang']}"
            self.model += self.x[self.matrix[i]['IdBarang']] <= self.matrix[i]['JumlahMaksimal'], f"Max Barang {self.matrix[i]['NamaBarang']}"
            self.model += self.x[self.matrix[i]['IdBarang']] <= self.matrix[i]['Stok'], f"Stok Barang {self.matrix[i]['NamaBarang']}"
        return None
    
    # Menyelesaikan model
    def Solve(self) -> None:
        self.SetMatrix()

        self.InitModel()
        self.InitVariable()
        self.SetObjective()
        self.SetConstraint()

        self.model.solve(PULP_CBC_CMD(msg=False))

        # Mencetak hasil
        print(f"\nStatus: {LpStatus[self.model.status]}")
        print(f"Keuntungan maksimal: {value(self.model.objective)}")
        print(f"Solusi: {self.model.variables()}")
        print(F"Maximize: {self.model.objective} \n")
        
        print("Daftar barang yang diambil:")
        for i in range(len(self.matrix)):
            if self.x[self.matrix[i]['IdBarang']].value() > 0:
                keuntungan = self.matrix[i]['HargaSatuan'] * self.x[self.matrix[i]['IdBarang']].value()
                print(f"{self.matrix[i]['NamaBarang']}: {self.x[self.matrix[i]['IdBarang']].value()} x {self.matrix[i]['HargaSatuan']} = {keuntungan}")
        return None

if __name__ == "__main__":
    pc = PackageCombination()
    pc.Solve()