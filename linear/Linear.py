from scipy.optimize import linprog

# input data
id_penjualan = [1, 2]
id_barang = [1, 1]
jumlah_penjualan = [50, 5]
harga_jual = [650000, 65000]
nama_barang = ['Beras Cianjur Tenggara', 'Beras Cianjur Tenggara']
stok_barang = [450, 495]
harga_satuan = [13000, 13000]
jumlah_minimal = [10, 10]
jumlah_maksimal = [700, 700]

# fungsi tujuan
def obj_func(x):
    return -sum(harga_jual[i]*x[i] for i in range(len(id_penjualan)))

# kendala
A = []
b = []
for j in range(len(id_barang)):
    A_row = [0]*len(id_penjualan)
    for i in range(len(id_penjualan)):
        if id_barang[i] == id_barang[j]:
            A_row[i] = 1
    A.append(A_row)
    b.append(stok_barang[j])
    A.append([-1*x for x in A_row])
    b.append(-1*jumlah_minimal[j])
    A.append(A_row)
    b.append(jumlah_maksimal[j])
    
# batasan non-negativitas
bounds = [(0, None)]*len(id_penjualan)

# hasil optimasi
res = linprog(c=[-1]*len(id_penjualan), A_ub=A, b_ub=b, bounds=bounds, method='simplex')

# output
print("Kombinasi paket penjualan yang optimal:")
for i in range(len(id_penjualan)):
    print("{} unit barang {} dengan harga jual Rp{}".format(int(res.x[i]), nama_barang[i], harga_jual[i]))
print("Total harga jual: Rp{}".format(-1*res.fun))
