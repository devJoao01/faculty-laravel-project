function wrapperMinHeight() {
    let wrapper = document.getElementById("wrapper"),
      headerHeight = document.getElementById("header").clientHeight,
      footerHeight = document.getElementById("footer").clientHeight,
      wrapperHeight = window.innerHeight - (headerHeight + footerHeight);
    wrapper.style.minHeight = `${wrapperHeight}px`;
  }

  window.addEventListener("load", wrapperMinHeight);
  window.addEventListener("resize", wrapperMinHeight);
