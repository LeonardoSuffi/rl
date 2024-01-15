public class Pessoa{
    private int cod;
    private String nome;

    public Pessoa(int cod, String nome) {
        this.cod = cod;
        this.nome = nome;
    }
    
    public String getNome() {
        return nome;
    }
    public void setNome(String nome) {
        this.nome = nome;
    }
}