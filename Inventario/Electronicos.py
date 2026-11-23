from Producto import Producto
# Herencia: Electronicos ES UN Producto
class Electronicos(Producto):
    def __init__(self, codigo, nombre, precio, cantidad, marca, garantia_meses):
        # super() llama al __init__ del papá Producto
        super().__init__(codigo, nombre, precio, cantidad)
        self.marca = marca
        self.garantia_meses = garantia_meses
 # Polimorfismo: mismo nombre, comportamiento propio
    def mostrar_tipo(self):
        print("Tipo: Electronico")
        print(f"Marca: {self.marca} | Garantia: {self.garantia_meses} meses")

    def calcular_precio(self):
        return self.precio * self.cantidad