package br.com.petasoft.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity(name="si_pessoa")
@Table(name="si_pessoa")
public class Pessoa {
	@Id
	@GeneratedValue
	private int id;
	
	@Column(nullable=false,unique=false,length=50)
	private String nome;
	
	@Column(nullable=false,unique=true,length=50)
	private String cpf;

	@Column(nullable=false)
	private Date nascimento;
	
	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getCpf() {
		return cpf;
	}

	public void setCpf(String cpf) {
		this.cpf = cpf;
	}

	public Date getNascimento() {
		return nascimento;
	}

	public void setNascimento(Date nascimento) {
		this.nascimento = nascimento;
	}


}
