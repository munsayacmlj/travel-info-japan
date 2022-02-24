<template>
  <div class="time">
    <figure>
      <img :src="`https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`" :alt="data.weather[0].main">
      <figcaption class="time__figcaption">{{data.weather[0].description}}</figcaption>
    </figure>
    <span class="time__update-time">Weather Updated as of {{data.time_readable}}</span>
    <span class="time__temperature">{{data.main.temp}}<sup>o</sup>C</span>
    <span class="time__feels-like">feels like: {{data.main.feels_like}}<sup>o</sup>C</span>
    <span class="time__wind">Wind: {{data.wind.speed}} m/s</span>
    <span class="time__snow" v-if="typeof data.snow !== 'undefined'">Snow: {{data.snow['3h']}}</span>
  </div>
</template>

<script>
export default {
  props: {
    data: Object
  },
}
</script>