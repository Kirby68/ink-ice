<template>
  <div class="image-slider">
    <div class="slider">
      <img :src="images[currentIndex]" :alt="'Image ' + currentIndex">
    </div>

    <button @click="prevImage" class="nav prev">«</button>
    <button @click="nextImage" class="nav next">»</button>

    <div class="indicators">
			<span
          v-for="(image, index) in images"
          :key="index"
          :class="{'active': index === currentIndex}"
          @click="goToImage(index)"
      ></span>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      currentIndex: 0,
      images: [
        "https://avatars.mds.yandex.net/get-shedevrum/15649402/img_bec94392f00511efbe8882e5ad6ac9f8/orig",
        "https://avatars.mds.yandex.net/get-shedevrum/13758706/img_9a271724f00511efb0a5de75a5cba2e4/orig",
        "https://avatars.mds.yandex.net/get-shedevrum/15288264/img_726cb88df00511efa533d2b5ba0d9db8/orig"
      ]
    };
  },
  methods: {
    prevImage() {
      this.currentIndex = (this.currentIndex === 0) ? this.images.length - 1 : this.currentIndex - 1;
    },
    nextImage() {
      this.currentIndex = (this.currentIndex === this.images.length - 1) ? 0 : this.currentIndex + 1;
    },
    goToImage(index) {
      this.currentIndex = index;
    }
  }
};
</script>
<style>
div.image-slider {
  width: 100%;
  max-width: 1000px;
  position: relative;
  margin: auto;
  overflow: hidden;
}

div.slider {
  width: 100%;
  height: 800px;
  display: flex;
  justify-content: center;
  align-items: center;
}

div.slider img {
  width: 100%;
  height: auto;
}

button.nav {
  border: none;
  background: transparent;
  font-size: 30px;
  color: white;
  padding: 10px;
  cursor: pointer;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}

button.nav.prev {
  left: 10px;
}

button.nav.next {
  right: 10px;
}

div.indicators {
  width: 100%;
  position: absolute;
  bottom: 10px;
  display: flex;
  justify-content: center;
}

div.indicators span {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #777;
  margin: 0px 5px;
  cursor: pointer;
}

div.indicators span.active {
  background: white;
}
</style>
