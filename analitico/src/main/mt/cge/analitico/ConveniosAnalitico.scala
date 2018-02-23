package mt.cge.analitico

import mt.cge.analitico.input.SisConHtmlParser
import mt.cge.analitico.output.CsvConvenioOutput
import mt.cge.analitico.stat.MunicipioCount
import mt.cge.analitico.stat.AcaoCount
import mt.cge.analitico.output.CsvCountOutput
import scala.collection.mutable.ListBuffer
import mt.cge.analitico.model.Convenio

object ConveniosAnalitico extends App {
  
  val pequenosMunicipio = List(
      "SÃO PEDRO DA CIPA",
      "UNIÃO DO SUL",
      "SANTA RITA DO TRIVELATO",
      "NOVA MARILÂNDIA",
      "SERRA NOVA DOURADA",
      "ARAGUAINHA"
  )
  
  val convenios = SisConHtmlParser("/home/francara/dev/cge/analitico/data/seduc-finalizados.html")
      .records
  
  var convGeral = ListBuffer.empty[Convenio]
  var convMunicipios = ListBuffer.empty[Convenio]
  var convEmendas = ListBuffer.empty[Convenio]
  
  // Convênios que NÃO são de pequenos municipios e NÃO são de EMENDAS
  convGeral ++= convenios.filter { (conv) => 
    (pequenosMunicipio.filter(_.equals(conv.municipio)).size == 0) && 
    (!conv.objeto.contains("EMENDA"))
  }

  // Convênios de pequenos municipios
  convMunicipios ++= convenios.filter(conv => pequenosMunicipio.filter(_.equals(conv.municipio)).size > 0)
  
  // Convênios de emenda NÃO de pequenos municípios
  convEmendas ++= convenios.filter { (conv) => 
    (pequenosMunicipio.filter(_.equals(conv.municipio)).size == 0) && 
    (conv.objeto.toUpperCase().contains("EMENDA"))
  }
  
  /*
   * Filtra os pequenos municipios e emendas
   */
      
  
  CsvConvenioOutput("/home/francara/dev/cge/analitico/data/seduc-finalizados-geral.csv")
      .save(convGeral.toList)
  CsvConvenioOutput("/home/francara/dev/cge/analitico/data/seduc-finalizados-municipios.csv")
      .save(convMunicipios.toList)
  CsvConvenioOutput("/home/francara/dev/cge/analitico/data/seduc-finalizados-emendas.csv")
      .save(convEmendas.toList)
    CsvCountOutput("/home/francara/dev/cge/analitico/data/seduc-finalizados-count.csv")
      .save(MunicipioCount(convenios), AcaoCount(convenios))        
}