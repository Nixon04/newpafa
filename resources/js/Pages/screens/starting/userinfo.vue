<template>
    <div>
        <div class="container">
            <div class="layer layer1">Layer 1</div>
            <div class="layer layer2">
                <div class="content">
                    <p v-for="i in 50" :key="i">Scrollable Content {{ i }}</p>
                </div>
            </div>
            <div class="layer layer3">Layer 3</div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'Questions',
};
</script>

<style scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container {
    display: flex;
    flex-direction: column;
    height: 100vh; /* Full viewport height */
}

.layer {
    width: 100%;
}

.layer1, .layer3 {
    height: 15vh; /* Fixed height for top and bottom */
    position: fixed;
    left: 0;
    right: 0;
    z-index: 10;
}

.layer1 {
    top: 0;
    background-color: #ff6347; /* Tomato */
}

.layer3 {
    bottom: 0;
    background-color: #32cd32; /* Lime Green */
}

.layer2 {
    position: absolute;
    top: 15vh;
    bottom: 15vh;
    width: 100%;
    overflow-y: auto; /* Makes this section scrollable */
    background-color: #4682b4; /* Steel Blue */
}

.content {
    padding: 10px;
}
</style>
