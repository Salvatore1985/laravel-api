<template>
  <section id="post-list">
    <h2>I miei post</h2>

    <Loader v-if="isLoading" />
    <div v-else>
      <Pagination
        :currentPage="pagination.currentPage"
        :lastPage="pagination.lastPage"
        @onPageChange="changePage"
      />
      <PostCard v-for="post in posts" :key="post.id" :post="post" />
      <Pagination
        :currentPage="pagination.currentPage"
        :lastPage="pagination.lastPage"
        @onPageChange="getPosts(page)"
      />
    </div>
  </section>
</template>

<script>
import PostCard from "./PostCard.vue";
import Loader from "../Loader.vue";
import Pagination from "../Pagination.vue";
// ? possiamo importarlo "axios" da qui o appure per averlo globaleda front.js */
/* import axios from "axios"; */
export default {
  name: "PostList",
  components: {
    PostCard,
    Loader,
    Pagination,
  },
  data() {
    return {
      baseUri: "http://localhost:8000",
      posts: [],
      isLoading: false, //isLoading e una variabile che definisco a false
      pagination: {},
      isActive: 0,
    };
  },
  methods: {
    getPosts(page) {
      this.isLoading = true; //Inizio chiamata in true
      axios
        .get(`${this.baseUri}/api/posts?page=${page}`)
        .then((res) => {
          /* this.posts = res.data.data; */ //? possiamo utilizzare anche un DESTRUCTIRING
          const { data, current_page, last_page } = res.data;
          this.posts = data;
          this.pagination = { currentPage: current_page, lastPage: last_page };
          /*   this.isLoading = false;  */ //fine chiamata in false ma in caso di errore lo devo mettere in then()
          console.log(this.posts);
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },

    changePage(page) {
      this.getPosts(page);
    },
  },
  created() {
    this.getPosts();
  },
};
</script>


