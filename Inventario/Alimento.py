from Producto import Producto
# Herencia: Alimento ES UN Producto
class Alimento(Producto):
    def __init__(self, codigo, nombre, precio, cantidad, fecha_vencimiento):
        super().__init__(codigo, nombre, precio, cantidad)
        self.fecha_vencimiento = fecha_vencimiento

    def mostrar_tipo(self):
        print("Tipo: Alimento")
        print(f"Vence: {self.fecha_vencimiento}")

    def calcular_precio(self):
        return self.precio * self.cantidad