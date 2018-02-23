package mt.cge.analitico.model

case class Convenio (
    val id:Int, 
    val unidade: String, 
    val conveniada: String,
    val municipio: String,
    val objeto: String,
    val programa:Int,
    val acao:Int,
    val numero: String,
    val inicio: String,
    val fim: String,
    val valorConvenio: Double,
    val valorContraparte: Double
)