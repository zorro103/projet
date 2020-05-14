<template>
  <!-- Cette partie va contenir notre HTML -->
  <div>
    <h1>{{ title }}</h1>
    <p>{{ tagline }}</p>
    <!-- on va créer la structure de notre application -->
    <section>
      <!-- zone où on va afficher le titre en cours de lecture -->
      <h2>Now playing : {{ current.title }}</h2>
      <p>By : {{ current.artist }}</p>
      <!-- zone où on va afficher les contrôles du player -->
      <button @click="prev" :disabled="index <= 0">Prev</button>
      <button v-if="!isPlaying" @click="play">Play</button>
      <button v-else @click="pause">Pause</button>
      <button @click="next" :disabled="index >= songs.length - 1">Next</button>
    </section>
    <section>
      <!-- zone où on va afficher notre playlist -->
      <h2>Ma playlist</h2>
      <div v-for="song in songs" :key="song.src">
        <h3>Track : {{ song.title }}</h3>
        <p>Artist : {{ song.artist }}</p>
        <button @click="play(song)">Play</button>
        <!-- <button @click="pause(song)">Pause</button> -->
        <!-- <button @click="pause">Pause</button> -->
      </div>
    </section>
  </div>
</template>

<script>
// Cette partie va contenir notre code JS
// on va devoir exporter le component pour qu'il puisse être accessible et utilisable par notre application
export default {
  name: "Player",
  props: {
    title: String,
    tagline: String,
  },
  data() {
    return {
      current: {},
      index: 0,
      isPlaying: false,
      songs: [
        {
          title: "Efficacy",
          artist: "Apache Tomcat",
          src: require("../assets/music/Apache_Tomcat_-_08_-_Efficacy.mp3"),
        },
        {
          title: "Gira Gira",
          artist: "In De Nadfin",
          src: require("../assets/music/In_De_Nadfin_-_06_-_Gira_gira.mp3"),
        },
        {
          title: "Last Energy For The Day",
          artist: "Freak Music",
          src: require("../assets/music/Loyalty_Freak_Music_-_08_-_Last_Energy_For_The_Day.mp3"),
        },
        {
          title: "To say goodbye",
          artist: "The Wrong Sister",
          src: require("../assets/music/The_Wrong_Sister_-_03_-_To_say_goodbye.mp3"),
        },
      ],
      // next on va initialiser notre player
      player: new Audio(),
    };
  },
  mounted() {
    // cette méthode fait partie du cycle de vie d'un composant vuejs
    // les instructions qui se trouvent à l'intérieur ne seront exécutées qu'une fois lorsque le composant est affiché
    this.current = this.songs[this.index];
    this.player.src = this.current.src;
  },
  methods: {
      play(song) {
      // on va déclencher le player lorsqu'on appuie sur le bouton play
      if (typeof song.src !== "undefined") {
        this.current = song;
        this.player.src = this.current.src;
      }
      this.isPlaying = true;
      this.player.play();
    },
    pause() {
      this.isPlaying = false;
      this.player.pause();
    },
    prev() {
      // on vérifie que l'index n'est pas inférieur à la longueur du tableau songs
      if (this.index <= 0) {
        this.index = 0;
        // si on veut revenir à la première chanson
        // this.index = 0;
      } else {
        this.index--;
      }

      // on remplace la valeur de this.current par la chanson sélectionnée
      this.current = this.songs[this.index];

      // on passe la nouvelle source au player
      this.player.src = this.current.src;
      this.isPlaying = true;
      this.player.play();
    },
    next() {
      // on vérifie que l'index n'est pas supérieur à la longueur du tableau songs
      if (this.index >= this.songs.length - 1) {
        this.index = this.songs.length - 1;
        // si on veut revenir à la première chanson
        // this.index = 0;
      } else {
        this.index++;
      }

      // on remplace la valeur de this.current par la chanson sélectionnée
      this.current = this.songs[this.index];

      // on passe la nouvelle source au player
      this.player.src = this.current.src;
      this.isPlaying = true;
      this.player.play();
    },
  },
};
</script>

<style>
/* Ici on va écrire note code CSS */
</style>
