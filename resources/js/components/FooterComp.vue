<template>
    <footer>
        <div class="footer-container">
      <div class="footer-section">
        <h3>DeliveBoo</h3>
        <ul>
          <li><a href="#">Chi siamo</a></li>
          <li><a href="#">Opportunità di lavoro</a></li>
          <li><a href="#">Stampa</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Termini e condizioni</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Cookie</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Scopri</h3>
        <ul>
          <li><a href="#">Cibo</a></li>
          <li><a href="#">Ristoranti</a></li>
          <li><a href="#">Città</a></li>
          <li><a href="#">Regali</a></li>
          <li><a href="#">Guida</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Restaurants</h3>
        <ul>
          <li><a href="#">Aggiungi il tuo ristorante</a></li>
          <li><a href="#">Registrati per effettuare la consegna</a></li>
          <li><a href="#">Programma di affiliazione</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>App</h3>
        <ul>
          <li><a href="#">Scarica l'app DeliveBoo</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Seguici</h3>
        <ul>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Instagram</a></li>
        </ul>
        <form class="newsletter-form" action="#" method="POST">
          <label for="email">Iscriviti alla newsletter:</label>
          <button class="btn" type="submit">Iscriviti</button>
        </form>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2023 DeliveBoo - Tutti i diritti riservati.</p>
    </div>
    </footer>
</template>




<script>
    export default {
    name: 'FooterComp',


    props: {

    },

    mounted(){


    },

    components: {

    },
    data(){
            return{

            }
        },
    methods: {

    },

    };

</script>

<style lang='scss' scoped>

footer {
  background-color: #232323;
  color: #fff;
  padding: 40px 0;
}

.footer-container {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
}

.footer-container::after {
  content: '';
  display: block;
  height: 1px;
  width: 100%;
  background-color: #dedcdc;
  margin-top: 40px;
}

.footer-section {
  margin-right: 40px;
}

.footer-section h3 {
  font-size: 18px;
  margin-bottom: 20px;
}

.footer-section ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.footer-section li {
  margin-bottom: 10px;
}

.footer-section a {
  color: #a3a1a1;
  text-decoration: none;
}

.footer-bottom {
  margin-top: 40px;
  text-align: center;
}

.newsletter-form {
    word-break: break-all;
    color: #a3a1a1;
  }

.btn {
  background: linear-gradient(to right, #e1a23d, #EFAD44);
  border: none;
  border-radius: 20px;
  color: #fff;
  cursor: pointer;
  font-size: 18px;
  font-weight: bold;
  padding: 10px 20px;
  transition: all 0.3s ease-in-out;
}

.btn:hover {
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  transform: translateY(-5px);
}

</style>
