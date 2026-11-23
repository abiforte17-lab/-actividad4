from Producto import Producto
# Herencia: Ropa ES UN Producto
class Ropa(Producto):
    def __init__(self, codigo, nombre, precio, cantidad, talla, marca):
        super().__init__(codigo, nombre, precio, cantidad)
        self.talla = talla
        self.marca = marca

    def mostrar_tipo(self):
        print("Tipo: Ropa")
        print(f"Talla: {self.talla} | Marca: {self.marca}")

    def calcular_precio(self):
        return self.precio * self.cantidad