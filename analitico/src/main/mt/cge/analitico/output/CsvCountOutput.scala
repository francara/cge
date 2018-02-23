package mt.cge.analitico.output

import mt.cge.analitico.model.Convenio
import java.io.FileWriter
import java.io.BufferedWriter
import java.io.File
import mt.cge.analitico.stat.MunicipioCount
import mt.cge.analitico.stat.AcaoCount

class CsvCountOutput (val fileName: String) {
  
  
  def save(mcount:MunicipioCount, acount:AcaoCount) {
    val bw = createWriter(fileName)
    bw.write("MUNICIPIO, QTD;\n")
    mcount.municipios.foreach { case(municipio, qtd) =>
      bw.write( 
          municipio + "," +
          qtd 
          + ";\n"
      )      
    }
    bw.write("PROGRAMA, AÇÃO, QTD;\n")    
    acount.acoes.foreach { case((programa,acao), qtd) =>
      bw.write( 
          programa + "," +
          acao + "," +
          qtd 
          + ";\n"
      )      
    }
    bw.close()
  }

  private [this] def createWriter(name:String) =
     new BufferedWriter(new FileWriter(new File(fileName))) 

}

object CsvCountOutput {
  def apply(fileName:String) = new CsvCountOutput(fileName)
}
