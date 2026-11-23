from Electronicos import Electronicos
from Alimento import Alimento
from Ropa import Ropa

# Creamos objetos de las subclases
producto1 = Electronicos(3683, "Bocina", 5200, 1, "JBL", 24)
producto2 = Alimento(1389, "Leche", 50, 3, "2026-11-29")
producto3 = Ropa(2970, "Playera", 1350, 1, "M", "Tommy Hilfiger")
producto4 = Ropa(1999, "Pantalon", 2500, 1, "L", "Levis")
# POLIMORFISMO: lista de tipo Producto, pero con objetos diferentes
productos = [producto1, producto2, producto3, producto4]
# Mismo método, diferente resultado en cada uno
for p in productos:
    p.mostrar_informacion()
    p.mostrar_tipo()
    print(f"Precio final: ${p.calcular_precio():.2f}")
    print("-" * 30)