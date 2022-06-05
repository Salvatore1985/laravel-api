<template>
  <div class="card mb-3 rounded" style="max-width: 540px">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img
          class="w-100 h-100 rounded-left"
          :src="post.image"
          :alt="'img to' + post.title"
        />
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ post.title }}</h5>
          <p class="card-text">
            {{ post.content }}
          </p>
          <p class="card-text">
            <small class="text-muted"
              >Creato il: {{ getFormattedDate(post.created_at) }}</small
            >
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
  methods: {
    getFormattedDate(data) {
      //*creao una funzione per convertire la data dal database
      const postdate = new Date(data);
      let day = postdate.getDate();
      let month = postdate.getMonth() + 1; //* sggiungo +1 perche il mesi vengono considerati come un array per questo aggiungo 1
      const year = postdate.getFullYear();
      //? aggiungo una condistione in caso il giorno e minore di 10
      if (day < 10) {
        day = "0" + day;
      }
      //? aggiungo una condistione in caso il mese e minore di 10
      if (month < 10) {
        month = "0" + month;
      }
      return `${day}/${month}/${year}`;
    },
  },
};
</script>

<style>
</style>
