<div class="div1">Seu Elemento</div>

<style>
.div1{
    transform: translate(-50%, -50%);
    animation: girarInfinitamente 2s linear infinite;
}

@keyframes girarInfinitamente {
    from {
        transform: translate(0%, 0%) rotate(0deg);
    }
    to {
        transform: translate(-50%, -50%) rotate(360deg);
    }
}
</style>