<template>
  <div class="weather">
    <div>
      <h2 class="weather__current-city">{{city}}</h2>
      <div>
        <div class="weather__days-list" v-if="daysCollection.length">
          <button class="weather__day-button" :class="{active: currentDay === day}" @click="currentDay = day" v-for="(day, index) in daysCollection" :key="index">{{day}}</button>
        </div>
        
        <h3 class="weather__now">{{currentDay}}</h3>
        <p class="weather__time-interval"><small>3hours interval</small></p>
        <div class="weather__current-day" v-if="typeof cache[city] !== 'undefined'">
            <Time :data="data" :key="`day-${index + 1}`" v-for="(data, index) in cache[city]['temperatures'][currentDay]"/>
        </div>
        <p v-else class="loading"><i class="icon-spinner icon-spin icon-large"></i></p>
      </div>
    </div>
  </div>
</template>

<script>
import Time from './Time';

export default {
  components: {
    Time,
  },
  props: {
    daysCollection: Array,
    cache: Object,
    currentDay: String,
    city: String,
  },
}
</script>