<template>
  <div class="container">
    <Header :title="title" />
    <main><PostList /></main>
  </div>
</template>

<script>
import Header from "./Header.vue";
import PostList from "./Posts/PostList.vue";
export default {
  name: "App",
  data() {
    return { title: "di post" };
  },
  components: {
    Header,
    PostList,
  },
};
</script>
