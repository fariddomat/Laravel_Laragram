<template>
  <div style="width:100%">
      <v-list
              class="p-3"
              v-for="(message, index) in allMessages"
              :key="index"
      >
          <div class="message-wrapper"
          :style="(user.id!==message.user_id)?'direction:rtl':'' ">
              <v-flex>
                  <span class="small font-italic">{{message.user.fname}}</span>
              </v-flex>





              <div v-if="message.message" class="text-message-container"
              :style="(user.id!==message.user_id)?'display:flex':'' ">
                  <v-chip :color="(user.id===message.user_id)?'green':'red'" text-color="white">
                      {{message.message}}

                  </v-chip>

              </div>

              <div class="image-container">
                  <img v-if="message.image"  :src="'/storage/'+message.image" alt="">

              </div>

              <v-flex class="caption font-italic">
                  {{message.created_date}}
              </v-flex>
          </div>


      </v-list>

  </div>
</template>

<script>
  export default {
    props:['user','allMessages'],

  }
</script>

<style scoped>
.chat-card{
  margin-bottom:140px;
}
.floating-div{
    position: fixed;
}
.chat-card img {
    max-width: 300px;
    max-height: 200px;
}

</style>
