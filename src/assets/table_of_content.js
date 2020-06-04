( function( blocks, element ) {
    var el = element.createElement;
    var blockStyle = {
        backgroundColor: '#900',
        color: '#fff',
        padding: '20px',
    };
    blocks.registerBlockType( 'gutenberg-examples/example-01', {
        title: 'Example: H1',
        icon: 'universal-access-alt',
        category: 'layout',
        edit: function() {
            return el(
                'h1',
                { style: blockStyle },
                'Hello World, we are vinasupport team.'
            );
        },
        save: function() {
            return el(
                'h1',
                { style: blockStyle },
                'Hello World, we are vinasupport team.'
            );
        },
    } );
}(
    window.wp.blocks,
    window.wp.element
));