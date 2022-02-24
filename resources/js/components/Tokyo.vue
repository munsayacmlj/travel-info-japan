<template>
  <div>
    <h1>Tokyo weather information</h1>
    <div class="list-group">
      <div class="list-group-item" :key="`day-${index + 1}`" v-for="(day, index) in days">
        <div class="day">
          <p>day {{ index + 1 }}</p>

        </div>
      </div>
    </div>
  </div>
  
</template>

<script>
export default {
  data: function () {
    return {
      days: [],
    }
  },

  mounted() {
    this.loadTemperatures();
  },

  methods: {
    loadTemperatures: function () {
      // load API
      axios.get('/api/tokyo')
          .then(response => {
            this.days = response.data;
            console.log(response.data);
          })
          .catch(error => console.log(error));
    },
  },
}
</script>
