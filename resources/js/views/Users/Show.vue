<template>
  <section class="flex flex-col items-center">
    <div class="relative">
      <div class="w-100 h-64 overflow-hidden z-10">
        <img
          src="https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569_960_720.jpg"
          alt="image user profile background"
          class="objet-cover w-full"
        />
      </div>
      <div v-if="!userLoading" class="absolute bottom-0 left-0 -mb-8 z-20 flex items-center ml-10">
        <img
          src="https://cdn.pixabay.com/photo/2014/07/09/10/04/man-388104_960_720.jpg"
          alt="profile image for user"
          class="w-32 h-32 object-cover border-4 border-gray-200 rounded-full"
        />
        <p class="text-2xl text-gray-100 ml-4">{{user.data.attributes.name}}</p>
      </div>
    </div>
    <p v-if="postLoading">Loading Posts..</p>
    <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post" />
    <p v-if="!postLoading && posts.data.lenght < 1">No posts found. Get started...</p>
  </section>
</template>

<script>
import Post from "../../components/Post";
export default {
  name: "Show",
  components: {
    Post
  },

  data: () => {
    return {
      user: null,
      posts: [],
      userLoading: true,
      postLoading: true
    };
  },

  mounted() {
    this.getUserProfile();
    this.getUserPosts();
  },

  methods: {
    getUserProfile() {
      axios
        .get("/api/users/" + this.$route.params.userId)
        .then(res => {
          this.user = res.data;
          this.userLoading = false;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getUserPosts() {
      axios
        .get("/api/users/" + this.$route.params.userId + "/posts")
        .then(res => {
          this.posts = res.data;
          console.log(this.posts);
          this.postLoading = false;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style>
</style>
