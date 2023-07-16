# API LEITORA DE ARQUIVO CSV, PDF, TXT

Esta API em PHP puro permite a leitura de arquivos nos formatos CSV, PDF e TXT. Além disso, ela armazena os dados em um banco de dados MariaDB e permite a consulta e exibição dos dados na tela.


## Xampp, lampp

Run 

```bash
  xampp start / lampp
```


## Usage/Examples


$user = new DBconexion();

$conexion = new mysqli("localhost", "root", "", "Almancenador") or die("not connected" . mysqli_connect_error());

$sql = "SELECT * FROM `Clientes`";

$result = mysqli_query($conexion, $sql);

$pedidos = array();
while ($fila = mysqli_fetch_array($result)) {
    $pedidos[] = $fila;
}

mysqli_free_result($result);
mysqli_close($conexion);


