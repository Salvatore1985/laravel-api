<template>
  <header>
    <div class="card-header">
      <h1>Benvenuti sul mio sito {{ title }}</h1>
    </div>
  </header>
</template>

<script>
export default {
  name: "Header",
  props: ["title"],
};
</script>

<style>
</style>
