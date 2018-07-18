<template>
  <div>
    <section class="hero is-primary is-medium is-bold">
        <div class="hero-body" :style="{
          backgroundImage: `url(${course.thumb})`,
          backgroundPosition: 'center center',
          backgroundRepeat: 'no-repeat',
          backgroundSize: 'cover'
        }">
        </div>
    </section>


    <div class="card article">
        <div class="card-content">
            <div class="media">
                <div class="media-content has-text-centered">
                    <p class="title article-title">{{ course.title }}</p>
                    <div class="tags has-addons level-item">
                        <span class="tag is-rounded is-primary"><i class="fa fa-user"></i>&nbsp;{{ course.user.name }}</span>
                        <span class="tag is-rounded">{{ course.created_at }}</span>
                    </div>
                </div>
            </div>
            <br>
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
                        <span class="tag is-rounded is-primary">{{ course.user.name }}</span>
                        <span class="tag is-rounded">{{ course.created_at }}</span>
                    </div> -->
                </div>
            </div>
            <br>
            <div class="content article-body">
              <div>
                <article class="media" v-if="course.comments.length != 0" v-for="(comment, index) in course.comments" :key="index">
                  <figure class="media-left">
                    <p class="image is-64x64">
                      <img src="https://bulma.io/images/placeholders/128x128.png">
                    </p>
                  </figure>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>{{ comment.name }}</strong> <small>{{ comment.created_at }}</small>
                        <br>
                        {{ comment.body }}
                        <br>
                      </p>
                    </div>
                  </div>
                  <div class="media-right" v-if="user.role.key != 'student'">
                    <button class="delete" @click.prevent="deleteComment(comment.id)"></button>
                  </div>
                </article>

                <div v-if="course.comments.length == 0">
                  <div class="box has-text-grey">
                    There is no comment found.
                  </div>

                  <br>
                </div>
              </div>

              <article class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                  </p>
                </figure>
                <div class="media-content">
                  <form :action="`/comments/add/courses/${course.id}`" method="POST">
                    <input type="hidden" name="_token" :value="token"/>
                    <div class="field">
                      <p class="control">
                        <textarea name="body" class="textarea" placeholder="Add a comment..."></textarea>
                      </p>
                    </div>
                    <div class="field">
                      <p class="control">
                        <button type="submit" class="button">Post comment</button>
                      </p>
                    </div>
                  </form>
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
    token: {
      type: String,
      required: true,
    },
    encoded_user: {
      type: String,
      required: true
    },
    encoded_course: {
      type: String
    }
  },

  data() {
    return {
      user: JSON.parse(this.encoded_user),
      course: JSON.parse(this.encoded_course)
    }
  },

  methods: {
    deleteComment(comment_id) {
      if (confirm('Are you sure?')) {
        let formDelete = `
          <form method="POST" action="/comments/${comment_id}/delete">
            <input type="hidden" name="_token" value="${this.token}"/>
            <input type="hidden" name="_method" value="DELETE"/>
          </form>
        `;

        $(formDelete).appendTo('body').submit();
      }
    }
  }
}
</script>

<style>

</style>
