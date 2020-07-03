
// Archivo con funciones para la navegación

import { smoothScroll } from '../helpers/func-aux'

const toggleNav = () =>{
  const panel = document.querySelector('.Panel')
  const panelBtn = document.querySelector('.Panel-btn')

  panelBtn.addEventListener('click', e =>{
    e.preventDefault()
    panelBtn.classList.toggle('is-active')
    panel.classList.toggle('is-active')
  })
}

const scrollNav = () =>{
  const panel = document.querySelector('.Panel')
  const panelBtn = document.querySelector('.Panel-btn')
  const itemLinks = document.querySelectorAll('.Menu-link')

  itemLinks.forEach( elem => elem.addEventListener('click', navBarClick))

  function navBarClick(e){
    smoothScroll(e)
    panelBtn.classList.toggle('is-active')
    panel.classList.toggle('is-active')
  }
}

export {
  toggleNav,
  scrollNav
}
