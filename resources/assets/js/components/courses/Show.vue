<template>
  <div>
    <!-- <section class="hero is-info is-medium is-bold">
        <div class="hero-body">
            <div class="has-text-centered">
                <h1 class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed eiusmod tempor incididunt ut labore et dolore magna aliqua</h1>
            </div>
        </div>
    </section> -->


    <div class="card article">
        <div class="card-content">
            <div class="media">
                <div class="media-content has-text-centered">
                    <p class="title article-title">{{ course.title }}</p>
                    <div class="tags has-addons level-item">
                        <span class="tag is-rounded is-info">{{ course.author.name }}</span>
                        <span class="tag is-rounded">{{ course.created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="content article-body" v-html="course.content"></div>
        </div>
    </div>

    <br>

    <div class="card article">
        <div class="card-content">
            <div class="media">
                <div class="media-content has-text-centered">
                    <p class="title article-title">Comments</p>
                    <!-- <div class="tags has-addons level-item">
                        <span class="tag is-rounded is-info">{{ course.author.name }}</span>
                        <span class="tag is-rounded">{{ course.created_at }}</span>
                    </div> -->
                </div>
            </div>
            <br>
            <div class="content article-body">
              <article class="media" v-for="(comment, index) in course.comments" :key="index">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                  </p>
                </figure>
                <div class="media-content">
                  <div class="content">
                    <p>
                      <strong>{{ comment.name }}</strong>
                      <br>
                      {{ comment.body }}
                      <br>
                      <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
                    </p>
                  </div>
                </div>
              </article>
              <article class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                  </p>
                </figure>
                <div class="media-content">
                  <div class="field">
                    <p class="control">
                      <textarea class="textarea" placeholder="Add a comment..."></textarea>
                    </p>
                  </div>
                  <div class="field">
                    <p class="control">
                      <button class="button">Post comment</button>
                    </p>
                  </div>
                </div>
              </article>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    encoded_course: {
      type: String
    }
  },

  data() {
    return {
      course: JSON.parse(this.encoded_course)
    }
  }
}
</script>

<style>

</style>
