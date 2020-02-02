<template>
    <div class="card" :class="{ 'border-success': madeIt == 'yes', 'border-danger': madeIt == 'no' }">
        <div class="card-header">{{ meal.name }}</div>

        <div class="card-body">
            <label for="answer">Type your answer</label>
            <textarea id="answer" name="answer" class="form-control" rows="10" :readonly="mode == MODE_ANSWERED"></textarea>
            <button class="btn btn-primary" v-if="mode == MODE_ANSWERING" @click="switchToAnswered">Validate
            </button>
            <template v-if="mode == MODE_ANSWERED">
                <label for="content">Actual content</label>
                <textarea readonly id="content" name="content" class="form-control" rows="10">{{ meal.content}}</textarea>

                <template v-if="madeIt == ''">
                    <strong>Did you find the correct answer ?</strong>
                    <button class="btn btn-success" @click="finish('yes')"><i class="fa fa-check"></i></button>
                    <button class="btn btn-danger" @click="finish('no')"><i class="fa fa-times"></i></button>
                </template>
            </template>
        </div>
    </div>
</template>

<script>
    const MODE_ANSWERING = 'ag'
    const MODE_ANSWERED = 'ad'

    export default {
        data () {
            return {
                MODE_ANSWERING: MODE_ANSWERING,
                MODE_ANSWERED: MODE_ANSWERED,

                mode: MODE_ANSWERING,
                madeIt: ''
            }
        },
        props: ['meal'],
        methods: {
            switchToAnswered () {
                this.mode = MODE_ANSWERED
            },
            finish(madeIt) {
                this.madeIt = madeIt
                this.$emit('finished', madeIt == 'yes')
            }
        },
        mounted () {
            console.log('Component mounted with meal ' + JSON.stringify(this.meal))
        }
    }
</script>
