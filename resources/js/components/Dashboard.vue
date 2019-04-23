<template>
  <div>
  <section class="crypto container">
    <h4 class="title-main">Wallet Balance <small>( Swipe Left/Right to view more )</small></h4>
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="crypto-b round">
                          <i class="fa fa-credit-card"></i>
                          <div class="ml-10">
                            <h4 class="coin-name">E-Wallet</h4>
                            <small class="g-text">{{ ewallet_balance }} USD</small>
                          </div>
                      </div>
        </div>

        <div class="swiper-slide">
          <div class="crypto-b app">
                          <i class="fa fa-credit-card"></i>
                          <div class="ml-10">
                            <h4 class="coin-name">Forex Wallet</h4>
                            <small class="g-text"> {{ forexwallet_balance }} USD</small>
                          </div>
                      </div>
        </div>
        <div class="swiper-slide">
          <div class="crypto-b vip">
                          <i class="fa fa-credit-card"></i>
                          <div class="ml-10">
                            <h4 class="coin-name">R-Wallet</h4>
                            <small class="g-text"> {{ rwallet_balance }} USD</small>
                          </div>
                      </div>
        </div>
        <div class="swiper-slide">
          <div class="crypto-b brands">
                          <i class="fa fa-credit-card"></i>
                          <div class="ml-10">
                            <h4 class="coin-name">Virtual Wallet</h4>
                            <small class="g-text"> {{ virtualwallet_balance }} USD</small>
                          </div>
                      </div>
        </div>

      </div>
    </div>
  </section>
  <section class="container">
  			    	<div class="resources-card-wrapper ">
  						<div class="ref-statistics mr-10 ">
                              <img src="Nandova/img/content/ref-icon3.png" class="img-xs" alt="">
                            	<div class="d-flex flex-column ml-md-2">
  	                          	<h4 class="mt-10 mb-5 ">$ {{ total_income }}</h4>
  	                            <p class="text-muted font-weight-medium">Total Income</p>
                          	</div>
  	                    </div>
  	                    <div class="ref-statistics ml-10">
                              <img src="Nandova/img/content/ref-icon3.png" class="img-xs" alt="">
                            	<div class="d-flex flex-column ml-md-2">
  	                          	<h4 class="mt-10 mb-5 ">$ {{ direct_income }} </h4>
  	                            <p class="text-muted font-weight-medium">Direct Income</p>
                          	</div>
  	                    </div>
                        <div class="ref-statistics ml-10">
                              <img src="Nandova/img/content/ref-icon3.png" class="img-xs" alt="">
                             <div class="d-flex flex-column ml-md-2">
                               <h4 class="mt-10 mb-5 ">$ {{ matching_income }}</h4>
                               <p class="text-muted font-weight-medium">Matching Income</p>
                           </div>
                       </div>

  					</div>
  					<div class="resources-card-wrapper">
  						<div class="ref-statistics mr-10">
                              <img src="Nandova/img/content/ref-icon4.png" class="img-xs" alt="">
                            	<div class="d-flex flex-column ml-md-2">
  	                          	<h4 class="mt-10 mb-5 ">$ {{ profit_share_income }}</h4>
  	                            <p class="text-muted font-weight-medium">Profit Share Income</p>
                          	</div>
  	                    </div>

  					</div>
            <div class="resources-card-wrapper">
              <div class="ref-statistics mr-10">
                              <img src="Nandova/img/content/ref-icon1.png" class="img-xs" alt="">
                              <div class="d-flex flex-column ml-md-2">
                                <h4 class="mt-10 mb-5 ">{{ direct_members }}</h4>
                                <p class="text-muted font-weight-medium">Direct Members</p>
                            </div>
                        </div>
                        <div class="ref-statistics ml-10">
                              <img src="Nandova/img/content/onboard3.png" class="img-xs" alt="">
                              <div class="d-flex flex-column ml-md-2">
                                <h4 class="mt-10 mb-5 "> {{ left_members }} </h4>
                                <p class="text-muted font-weight-medium">Left Members</p>
                            </div>
                        </div>
                        <div class="ref-statistics ml-10">
                              <img src="Nandova/img/content/onboard1.png" class="img-xs" alt="">
                              <div class="d-flex flex-column ml-md-2">
                                <h4 class="mt-10 mb-5 "> {{ right_members }} </h4>
                                <p class="text-muted font-weight-medium">Right Members</p>
                            </div>
                        </div>
            </div>
  			    </section>
  <section class="crypto container">
    <h4 class="title-main">Matching Points</h4>
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="crypto-b brands">
                          <i class="cc LTC-alt"></i>
                          <div class="ml-10">
                            <h4 class="coin-name">Left Points</h4>
                            <small class="g-text"> {{ left_points }} </small>
                          </div>
                      </div>
        </div>
        <div class="swiper-slide">
          <div class="crypto-b flash">
                          <i class="cc REP-alt"></i>
                          <div class="ml-10">
                            <h4 class="coin-name">Right Points</h4>
                            <small class="g-text">{{ right_points }} </small>
                          </div>
                      </div>
        </div>
      </div>
    </div>
  </section>
</div>
</template>
<script>
    export default {
        data: function() {
            return {
                    rwallet_balance : 0.00,
                    ewallet_balance : 0.00,
                    virtualwallet_balance : 0.00,
                    forexwallet_balance : 0.00,
                    lottowallet_balance : 0.00,
                    compoundingwallet_balance : 0.00,
                    total_income  : 0.00 ,
                    matching_income : 0.00,
                    direct_income : 0.000,
                    profit_share_income : 0.00,
                    leadership_income : 0.00,
                    direct_members : 0,
                    left_members : 0,
                    right_members : 0,
                    left_points : 0 ,
                    right_points : 0
            };
        },
        mounted() {
            this.walletList();
            this.incomeSummary();
            this.matchingPoints();
            this.downlines();
        },
         methods: {
             walletList(){
                 axios.get("dashboard/balances").then(response => {
                    this.ewallet_balance = response.data.ewallet;
                    this.rwallet_balance = response.data.rwallet;
                    this.virtualwallet_balance = response.data.virtualwallet;
                    this.lottowallet_balance = response.data.lottowallet;
                    this.forexwallet_balance = response.data.forexwallet;
                    this.compoundingwallet_balance = response.data.compounding;
                });
             },
             incomeSummary() {
                 axios.get("dashboard/incomes").then(response => {
                    this.total_income = response.data.total_income;
                    this.direct_income = response.data.direct_income;
                    this.matching_income = response.data.matching_income;
                    this.profit_share_income = response.data.profit_share_income;
                    this.leadership_income = response.data.leadership_income;
                });

             },
             matchingPoints() {
                     axios.get("dashboard/matchingpoints").then(response => {
                        this.left_points = response.data.left_points;
                        this.right_points = response.data.right_points;
                    });
             },
             downlines() {
                     axios.get("dashboard/downlines").then(response => {
                        this.direct_members = response.data.direct_donwlines;
                        this.left_members = response.data.left_downlines;
                        this.right_members = response.data.right_downlines;
                    });
             }


         }
    }
</script>
