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
        <h3>Ristoranti</h3>
        <ul>
          <li><a href="#">Aggiungi il tuo ristorante</a></li>
          <li><a href="#">Programma di affiliazione</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Assistenza clienti</h3>
        <ul>
          <li><a href="#">Domande frequenti</a></li>
          <li><a href="#">Guida</a></li>
        </ul>
      </div>
      <div class="footer-icons footer-section">
        <h3>Seguici</h3>
        <ul>
          <li><a href="#"><font-awesome-icon :icon="['fab', 'instagram']" class="instagram" /></a></li>
          <li><a href="#"><font-awesome-icon :icon="['fab', 'whatsapp']" class="whatsapp" /></a></li>
          <li><a href="#"><font-awesome-icon :icon="['fab', 'twitter']" class="twitter" /></a></li>
        </ul>
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

  mounted() {

  },

  components: {

  },
  data() {
    return {

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
  padding: 2em 2em;
}

.footer-container {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
}

.footer-container::after {
  content: '';
  display: block;
  height: 1px;
  width: 100%;
  background-color: white;
  margin-top: 40px;
}

.footer-section {
  margin-right: 40px;
  margin-top: 25px;
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

.footer-section a:hover {
  color: #e1a23d;
}

.footer-bottom {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #232323;
  color: #e1a23d;
  padding: 1em 0;
}

.instagram,
.whatsapp,
.twitter {
  transition: color 0.2s ease-in-out;
}

.instagram:hover{
    color: #E1306C;
}

.whatsapp:hover {
  color: #25D366;
}

.twitter:hover {
  color: #1DA1F2;
}

</style>

