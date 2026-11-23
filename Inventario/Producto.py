from abc import ABC, abstractmethod
# Clase abstracta: no se puede instanciar, solo sirve como base
# Actúa como interfaz porque obliga a las hijas a tener estos métodos
class Producto(ABC):
    def __init__(self, codigo, nombre, precio, cantidad):
        self.codigo = codigo
        self.nombre = nombre
        self.precio = precio
        self.cantidad = cantidad
 # Método concreto: lo heredan todas las hijas igual
    def mostrar_informacion(self):
        print(f"Codigo: {self.codigo}")
        print(f"Nombre: {self.nombre}")
        print(f"Precio: ${self.precio}")
        print(f"Cantidad: {self.cantidad}")
  # Métodos abstractos: cada hija los implementa a su manera = POLIMORFISMO
    @abstractmethod
    def mostrar_tipo(self):
        pass

    @abstractmethod
    def calcular_precio(self):
        pass