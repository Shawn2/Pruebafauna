function Mostrar_Ocultar_Descripcion(id)
{
var obj = document.getElementById('descripcion_'+ id);
if (obj.style.display == 'none')
    obj.style.display = 'block';
else
    obj.style.display = 'none';
}