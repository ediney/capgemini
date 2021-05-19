<template>
    <div>
        <div class="container"
            style="
                background-color: #F1F1F1;
                margin-top: 25px;
                max-width: 500px;
                border: 1px solid #ccc;
                padding: 2rem 3rem;
            "
        >
        <h2 class="text-center">BANCO CAPGEMINI</h2>

        <div class="row">
            <form @submit.prevent="entrar">
                <div class="row">
                    <div class="col-8">
                        <input type="text" class="form-control"
                            placeholder="Informe o número da conta"
                            v-model="numero"
                        />
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Entrar
                        </button>
                    </div>
                    <div v-if="mensagem" class="alert alert-danger" role="alert">
                        {{ mensagem }}
                    </div>
                </div>
            </form>
                <br />
                <br />
                <div v-if="error">
                    <div class="">
                        <p style="float: left">
                            Bem vindo: <b>{{ cliente.nome }}</b>
                        </p>
                        <p style="float: right">
                            Saldo atual: <b>R$ {{ saldo }}</b>
                        </p>
                    </div>

                    <div class="card_footer row">
                        <div class="col-6">
                            <form action="">
                                <input type="text" class="form-control"
                                    placeholder="R$ 0,00"
                                    v-model="valor_saque"
                                />
                                <button class="btn btn-warning btn-block"
                                    v-on:click.prevent="sacar">Sacar
                                </button>
                            </form>
                        </div>
                        <div class="col-6">
                            <form action="">
                                <input type="text" class="form-control"
                                    placeholder="R$ 0,00"
                                    v-model="valor_deposito"
                                />
                                <button class="btn btn-success btn-block"
                                    v-on:click.prevent="depositar">Depositar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Task',

    data() {
        return {
            valor_saque: "",
            valor_deposito: "",
            saldo: "",
            conta: "",
            agencia: "",
            numero: "",
            cliente: {
                nome: "",
            },
            mensagem: "",
            error: false,
            uri: 'http://127.0.0.1:8000/api/tasks'
        };
    },

    methods: {
        entrar() {
            this.preloader = true;
            this.mensagem = "";
            this.reset();
            if (!this.numero) {
                this.mensagem = "Atenção: Informe o número da conta.";
                return;
            }
            this.$http
            .post(this.uri + "/show/" + this.numero)
            .then((response) => {
                this.cliente.nome = response.body.cliente.nome;
                this.saldo = response.body.saldo;
                this.error = true;
            },
            (error) => {
                this.mensagem = error.body.message;
                this.error = false;
            }
        );
    },

    sacar() {
        this.mensagem = "";

        if (!this.numero) {
            this.mensagem = "Atenção: Informe o número da conta.";
            return;
        }
        if (this.valor_saque <= 0) {
            this.mensagem = "Informe um valor válido.";
            return;
        }
        this.$http
        .post( this.uri + "/sacar/" + this.numero + "/" + this.valor_saque)
        .then((response) => {
            this.cliente.nome = response.body.cliente.nome;
            this.saldo = response.body.saldo;

            this.valor_saque = "";
        },
        (error) => {
            this.mensagem = error.body.message;
            this.error = true;
            this.valor_saque = "";
        });
    },

    depositar() {
        this.mensagem = "";

        if (!this.numero) {
            this.mensagem = "Atenção: Informe o número da conta.";
            return;
        }

        if (this.valor_deposito <= 0) {
            this.mensagem = "Informe um valor válido.";
            return;
        }

        this.$http
        .post(this.uri + "/depositar/" + this.numero + "/" + this.valor_deposito)
        .then((response) => {
            this.cliente.nome = response.body.cliente.nome;
            this.saldo = response.body.saldo;

            this.valor_deposito = "";
        },
        (error) => {
            this.mensagem = error.body.message;
            this.error = true;
            this.valor_deposito = "";
        });
    },

        reset() {
            this.cliente.nome = ""
            this.saldo=""
            this.valor_saque=""
            this.valor_deposito=""
            this.conta=""
        }
    },
};
</script>

<style scoped>
.btn-block {
  width: 100%;
  margin-top: 7px;
}
.card_footer {
  margin-top: 3rem;
  text-align: center;
}
</style>