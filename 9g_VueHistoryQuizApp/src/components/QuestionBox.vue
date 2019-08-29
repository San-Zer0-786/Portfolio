<template>
<div class='question-box-container'>
  <b-jumbotron>
    <template slot="lead">
     {{currentQuestion.question}}
    </template>

    <hr class="my-4">

    <b-list-group>
       <b-list-group-item 
       :class="answerClass(index)"
       v-for="(answer,index) in shuffledAnswers" 
       :key="answer"
        @click='selectAnswer(index)'>
         {{answer}}
       </b-list-group-item>
    </b-list-group>

    <b-button variant="primary" 
    @click="submitAnswer()"
    href="#"
    :disabled="selectedIndex === null || answered"
    >Submit
    </b-button>

    <b-button variant="success" 
    @click="next();" 
    href="#"
    >Next
    </b-button>
  </b-jumbotron>
</div>
</template>

<script>
import _ from 'lodash'
export default {

  props: [
    'currentQuestion',
    'next',
    'increment'
  ],
  // props: {
  //   currentQuestion: Object,
  //   next: Function,
  //   increment: Function
  // },

  data() {
    return {
      selectedIndex: null,
      correctAnswerIndex: null,
      incorrect: false,
      shuffledAnswers: [],
      answered: false
    }
  },

  computed: {
    answers() {
    let answers = [...this.currentQuestion.incorrect_answers, this.currentQuestion.correct_answer]
     return answers
    }
  },
  
    watch: {
      currentQuestion: {
        immediate:true,
        handler() {
          this.selectedIndex = null
          this.correctAnswerIndex = null
          this.answered = false
          this.shuffleAnswers()
        }
      }
    },

  methods: {
    answerClass(index) {
      let answerClass = ""

      if(!this.answered && this.selectedIndex === index) {
        answerClass = "selected"
      } else if (this.answered && this.correctAnswerIndex == index) {
        answerClass = "correct"
      } else if (this.answered && this.selectedIndex === index && this.correctAnswerIndex !== index) {
        answerClass = "incorrect"
      }

      return answerClass
    },
    selectAnswer(index) {
     this.selectedIndex = index;
    },

    shuffleAnswers() {
      this.shuffledAnswers = _.shuffle(this.answers)
      
    },

    submitAnswer() {
        this.correctAnswerIndex = this.shuffledAnswers.indexOf(this.currentQuestion.correct_answer)
        
        let isCorrect = false;

        if (this.selectedIndex === this.correctAnswerIndex) {
          isCorrect = true;
        }
        this.answered = true;
        this.increment(isCorrect)

        // }
        // if (this.selectedIndex !== this.correctAnswerIndex) {
        //   this.incorrect = true
        }
    },
  }
</script>

<style scoped>
  .list-group {
    margin: 10px;
  }

  .list-group-item:hover {
    background-color: darkgray;
    cursor: pointer;
  }

  .btn {
    margin: 0 5px;
  }

  .selected {
    background-color: lightblue;
  }

  .correct {
    background-color: greenyellow;
  }

  .incorrect {
    background-color: red;
  }
</style>