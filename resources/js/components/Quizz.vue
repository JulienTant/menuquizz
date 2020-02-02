<template>
    <div>
        <h2 v-if="totalFinished == meals.length">

            Score : {{ score }}/{{ meals.length}}


        </h2>
        <h3>
            <button class="btn btn-outline-secondary" @click="current--" v-if="current > 0"><i class="fa fa-angle-double-left"></i></button>
            Meal : {{ current+1 }}/{{ meals.length}}
            <button class="btn btn-outline-secondary" @click="current++" v-if="current < meals.length-1"><i class="fa fa-angle-double-right"></i></button>
        </h3>

        <quizz-meal v-for="(meal, index) in meals" :key="meal.id" :meal="meal" @finished="finished" v-show="index == current"></quizz-meal>
    </div>
</template>

<script>
    export default {
        data() {
          return {
              current: 0,
              score: 0,
              totalFinished: 0,
          }
        },
        methods: {
            finished(madeIt) {
                this.totalFinished++;
                if (madeIt) {
                    this.score++;
                }

                if (this.totalFinished < this.meals.length) {
                    this.current += 1
                }
            }
        },
        props: ['meals'],
    }
</script>
