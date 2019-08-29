<template>
  <div id="app">
    <Header 
    :numCorrect="numCorrect"
    :numTotal="numTotal"/>

  <b-container class="bv-example-row">
    <b-row>
      <b-col sm="6" offset=3>
            <QuestionBox 
              :currentQuestion="questions[index]"
              v-if='questions.length>0'
              :next='next'
              :increment="increment"
            />
      </b-col>
      
    </b-row>
  </b-container>

  </div>
</template>

<script>
import Header from './components/Header.vue';
import QuestionBox from './components/QuestionBox.vue';

export default {
  name: 'app',
  components: {
    Header,
    QuestionBox
  },

  data() {
    return {
      questions: [],
      answers:[],
      index: 0,
      numCorrect: 0,
      numTotal: 0
    }
  },

  methods: {
    next() {
      this.index++;
      if (this.index === this.questions.length) {
        this.index = 0;
      }
    },
    increment(isCorrect) {
      if (isCorrect) {
        this.numCorrect++
      }
      this.numTotal++
    }
  },

  mounted: function() {
    fetch('https://opentdb.com/api.php?amount=10&category=23&difficulty=medium&type=multiple',
    {
      method: 'get'
    })
    .then((response) => {
      return response.json()
    })
    .then((jsonData) => {
        this.questions = jsonData.results
    })
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
