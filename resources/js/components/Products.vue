<template>
  <div>
    <div>
      <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="/index">Illuminum Green House</a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
              <li role="presentation">
                <a href="/index">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link"
                  data-toggle="modal"
                  data-target="#mymodal"
                  href="javascript:void(0)"
                >
                  <i class="fa fa-shopping-cart"></i>&nbsp; Cart
                  <sup class="badge success">{{cart.length}}</sup>
                </a>
              
              </li>


              <li v-if="role==='admin'" role="presentation">
                <a href="/home"><i class="fa fa-dashboard"></i>  Dashboard</a>
              </li>
              <li role="presentation">
                <a href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                 <form id="logout-form" action="/logout" method="POST" style="display: none;">
                      <input type="hidden" name="_token" :value="csrf"/>
                  </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <!-- my modal here -->
    <div class="modal fade" id="mymodal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">Shopping cart</div>
          <div class="modal-body">
            <ul class="list-group">
              <li
                v-for="item in cart"
                :key="item.id"
                class="list-group-item"
                style="list-style-type:none"
              >
                {{item.name}} - Ksh/= {{item.price}}
                <button
                  @click="removefromcart(item)"
                  class="btn badge float-right"
                  style="background:red; color:white"
                >remove</button>
              </li>

              <br>

              Total: ksh {{total}}
            </ul>
          </div>
          <div class="modal-footer">
            <button
              @click="paynow"
              :disabled="disablecart"
              class="btn btn-primary float-left"
              data-dismiss="modal"
            >Check Out</button>
          </div>
        </div>
      </div>
    </div>

    <div id="intro" class="highlight-clean">
      <div class="container">
        <div class="intro">
          <h2 class="text-center" style="color:blanchedalmond">Illuminum Green House</h2>
          <p
            class="text-center"
            style="color:white"
          >Dedicated to delivering quality organic food, for a healthier generation&nbsp;</p>
        </div>
        <div class="buttons">
          <a class="btn btn-primary" role="button" href="#products">start shopping</a>
          
        </div>
      </div>
    </div>
    <div class="article-list"  >
      <div class="container" id="products">
        <div class="intro">
          <h2 class="text-center">Products</h2>
          <p
            class="text-center"
          >Start shopping now, &nbsp;Browse through &nbsp;a wide collection of product</p>
          <br>
          <div class="text-center">
            <div class="input-group">
              <div class="input-group-addon " style="background:#055ada;color:white;"><i class="fa fa-search"></i></div>
               <input v-model="search" type="search" placeholder="search for products" class="form-control"/>
            </div>
         
          </div>
        </div>
        <div class="row articles">
          <div v-for="product in filteredlist" :key="product.id" class="col-md-4 col-sm-6 item">
            <a href="#">
              <img
                class="img-responsive"
                :src="'/storage/app_images/'+product.image"
                style="width:250px;height:300px;"
              >
            </a>
            <h3 class="name">{{product.name}} - ({{product.variety}})</h3>
            <p class="description" v-html="product.description"></p>
            <button
              :disabled="isincart(product)"
              @click="addtocart(product)"
              class="btn btn-primary"
              type="button"
            >
              KSH {{product.price}}
              <i class="fa fa-shopping-basket"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="features-boxed">
      <div class="container">
        <div class="intro">
          <h2 class="text-center">Features</h2>
          <p
            class="text-center"
          >Wonder why we are the best in the market?</p>
        </div>
        <div class="row features">
          <div class="col-md-4 col-sm-4 item">
            <div class="box">
              <i class="glyphicon glyphicon-map-marker icon"></i>
              <h3 class="name">Deliver everywhere</h3>
              <p
                class="description"
              >Our products can be delivered on order anywhere in kenya</p>
              
            </div>
          </div>
        
         
          <div class="col-md-4 col-sm-4 item">
            <div class="box">
              <i class="glyphicon glyphicon-leaf icon"></i>
              <h3 class="name">Organic</h3>
              <p
                class="description"
              >We are dedicated to delivering quality organic products</p>
              
            </div>
          </div>
          <div class="col-md-4 col-sm-4 item">
            <div class="box">
              <i class="glyphicon glyphicon-plane icon"></i>
              <h3 class="name">Fast</h3>
              <p
                class="description"
              >It is easy,first and secure to place an oder. Just add items to cart and checkout</p>
  
            </div>
          </div>
        
        </div>
      </div>
    </div>
    <div class="highlight-blue">
      <div class="container">
        <div class="intro">
          <h2 class="text-center">Need to do some shopping? don't be left out...&nbsp;</h2>
        </div>
        <div class="buttons">
          <a class="btn btn-primary" role="button" href="#products">Start shopping now</a>
        </div>
      </div>
    </div>

    <div class="footer-dark">
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-push-6 item text">
              <h3>Illuminum Green House</h3>
              <p>Illuminum greenhouse is a team of dedicated people with the aim of producing quality and healthy products for a stronger and healthier nation.</p>
            </div>
            <div class="col-md-3 col-md-pull-6 col-sm-4 item">
              <h3>Strengths</h3>
              <ul>
                <li>
                  <a href="#">Organic Products</a>
                </li>
                <li>
                  <a href="#">Pocket friendly</a>
                </li>
                <li>
                  <a href="#">Healthy Products</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3 col-md-pull-6 col-sm-4 item">
              <h3>About</h3>
              <ul>
                <li>
                  <a href="#">Company</a>
                </li>
                <li>
                  <a href="#">Team</a>
                </li>
                <li>
                  <a href="#">Products</a>
                </li>
              </ul>
            </div>
            <div class="col-md-12 col-sm-4 item social">
              <a href="#">
                <i class="icon ion-social-facebook"></i>
              </a>
              <a href="#">
                <i class="icon ion-social-twitter"></i>
              </a>
              <a href="#">
                <i class="icon ion-social-snapchat"></i>
              </a>
              <a href="#">
                <i class="icon ion-social-instagram"></i>
              </a>
            </div>
          </div>
          <p class="copyright">Illuminum Green House © 2019</p>
        </div>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  props: ["userid","username","role"],
  data() {
    return {
    csrf:document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      products: [],
      cart: [],
      disablecart: true,
      search:'',
    };
  },
  created() {
    this.fetchproducts();
  },
  methods: {
    fetchproducts() {
      axios.get("/api/products").then(response => {
        this.products = response.data;
        
      });
    },
    addtocart(product) {
      this.cart.push(product);
      this.disablecart = false;
    },
    isincart(product) {
      const item = this.cart.find(item => item.id === product.id);
      if (item) {
        return true;
      }
      return false;
    },
    removefromcart(item) {
      this.cart = this.cart.filter(cart => cart.id !== item.id);
      if (this.cart.length < 1) {
        this.disablecart = true;
      }
    },
    paynow() {


        axios.post("/orders", { orders: this.cart ,user:this.userid})
        .then(response => {
         
          this.disablecart = true;
          this.cart = [];
      alert("order placed successfully");
        })
        .catch(e => {
          console.log(e);
        });

     
    }
  },
  computed: {
    total() {
      return this.cart.reduce((acc, item) => acc + Number(item.price), 0);
    },
    filteredlist(){
      if(this.search){

return this.products.filter((item) => {return item.name.toLowerCase().includes(this.search.toLowerCase())
});

    
      }
      else{
        return this.products
      }
    },
  }
};
</script>

<style>
</style>
