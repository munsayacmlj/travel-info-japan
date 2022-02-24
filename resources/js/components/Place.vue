<template>
  <div class="places__item">
    <div class="places__item-container">
      <figure v-if="place.categories.length" class="places__item-icons">
        <img :src="`${cat.icon.prefix}60${cat.icon.suffix}`" :alt="cat.name" v-for="(cat, index) in place.categories" :key="index">
      </figure>
      <h3 class="places__item-name">{{place.name}}</h3>
      <div class="places__item-categories" v-if="place.categories.length">
        <span class="places__item-category" v-for="(cat, index) in place.categories" :key="index">{{cat.name}}</span>
      </div>
      <p class="places__item-adadress"><strong>Address: </strong>{{place.location.formatted_address}}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Place',
  props: {
    place: Object,
  },
}
</script>