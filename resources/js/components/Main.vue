<template>
  <div class="main-container">
    <h1 class="page-title">Japan Weather Information</h1>
    
    <div>
      <p class="page-subtitle">Popular cities to visit: </p>
      <div class="buttons">
        <button class="city-button" ref="cityButton" @click="setNewCity" v-for="item in cities" :key="item" :class="{ active: item === city}">{{item}}</button>
      </div>
    </div>

    <div v-if="Object.keys(temperatureCollection).length">
      <Weather :daysCollection="daysCollection" :cache="cache" :currentDay="currentDay" :city="city"/>
    </div>
    <h2 v-else class="no-data">No data...</h2>

    <p ref="mainLoader" class="main-loader hidden loading"><i class="icon-spinner icon-spin icon-large"></i></p>

    <div v-if="typeof cache[city] !== 'undefined'" class="places">
      <h2 class="places__title">Places nearby</h2>
      <Place :key="index" :place="place" v-for="(place, index) in cache[city]['places']" />
    </div>
  </div>
</template>

<script>
import Weather from './Weather';
import Place from './Place';

export default {
  name: 'Main',

  components: {
    Weather,
    Place,
  },

  
  data: function () {
    return {
      city: '',
      daysCollection: [],
      temperatureCollection: {},
      cache: {},
      currentDay: '',
      cityDetails: {},
      places: [],
      cities: ['Tokyo', 'Osaka', 'Sapporo', 'Yokohama', 'Nagoya', 'Kyoto'],
    };
  },

  methods: {
    setNewCity: function (e) {
      this.city = e.target.textContent;
      this.currentDay = this.daysCollection[0];

      if (!Object.keys(this.cache).length) {
        this.$refs.mainLoader.classList.remove('hidden');
      }

      if (typeof this.cache[this.city] === "undefined") {
        this.$refs.cityButton.forEach(element => {
          element.setAttribute('disabled', true);
        });
        this.loadDaysTemperatures();
      }
    },

    loadDaysTemperatures: function () {
      // load API
      axios.get(`/api/${this.city.toLowerCase()}`)
          .then(response => {
            this.temperatureCollection = response.data.temperature_collection;
            this.daysCollection = response.data.days_collection;
            this.cityDetails = response.data.city_details;

            this.cache[this.city] = {};
            this.cache[this.city]['temperatures'] = this.temperatureCollection;
            this.currentDay = this.daysCollection[0];
            this.$refs.cityButton.forEach(element => {
              element.removeAttribute('disabled');
            });

            this.$refs.mainLoader.classList.add('hidden');
          })
          .then(() => {
            this.loadPlaces();
          })
          .catch(error => console.log(error));
    },

    loadPlaces: function () {
      const {lat, lon} = this.cityDetails.coord;

      axios.get(`/api/places/${lat}/${lon}`)
          .then(response => {
            this.places = response.data.results;
            this.cache[this.city]['places'] = this.places;
          })
          .catch(error => console.log(error));
    },
  },
}
</script>