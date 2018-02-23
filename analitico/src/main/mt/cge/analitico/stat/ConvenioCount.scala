package mt.cge.analitico.stat

import mt.cge.analitico.model.Convenio

abstract class ConvenioCount(val convenios:List[Convenio])

case class AcaoCount(override val convenios:List[Convenio]) extends ConvenioCount(convenios){
  val acoes = scala.collection.mutable.Map.empty[(Int,Int), Int]
  convenios.map(conv => (conv.programa, conv.acao)).foreach{ case (programa, acao) =>
    if (acoes.contains((programa, acao))) acoes((programa,acao)) = acoes((programa,acao)) + 1 
    else acoes += ((programa, acao) -> 1) 
  } 
}

case class MunicipioCount(override val convenios:List[Convenio]) extends ConvenioCount(convenios) {  
  val municipios = scala.collection.mutable.Map.empty[String, Int]
  convenios.map(_.municipio).foreach{ mun =>
    if (municipios.contains(mun)) municipios(mun) = municipios(mun) + 1
    else municipios += (mun -> 1)
  }  
}

