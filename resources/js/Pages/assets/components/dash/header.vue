<script setup>
 const getstate  = (filename) => `/images/${filename}`;
</script>

<template>
    <div>
        <div class="dash-container">
            <div class="dashflex-container">
                <div class="logoimg">
                    <img :src="getstate('PAFALOGO.png')" alt="_image" class="img-logo">
                  </div>
                  <span>Logout</span>
            </div>
        </div>
    </div>
</template>