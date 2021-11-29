function fallbackCopyTextToClipboard( text ) {
	const textArea = document.createElement( 'textarea' );
	textArea.value = text;

	// Avoid scrolling to bottom
	textArea.style.top = '0';
	textArea.style.left = '0';
	textArea.style.position = 'fixed';

	document.body.appendChild( textArea );
	textArea.focus();
	textArea.select();

	try {
		const successful = document.execCommand( 'copy' );
		const copyResult = document.querySelector( '.js-copy-tec-ical-feed-result' );

		if ( copyResult && successful ) {
			copyResult.classList.add( 'is-active' );
		}
	} catch ( err ) {
		console.error( 'Fallback: Oops, unable to copy', err );
	}

	document.body.removeChild( textArea );
}

function copyTextToClipboard( text ) {
	if ( ! navigator.clipboard ) {
		fallbackCopyTextToClipboard( text );
		return;
	}
	navigator.clipboard.writeText( text ).then( function() {
		const copyResult = document.querySelector( '.js-copy-tec-ical-feed-result' );

		if ( copyResult ) {
			copyResult.classList.add( 'is-active' );
		}
	}, function( err ) {
		console.error( 'Async: Could not copy text: ', err );
	} );
}

const copyButton = document.querySelector( '.js-copy-tec-ical-feed-button' );
const copyUrl = document.querySelector( '.js-copy-tec-ical-feed-url' );

copyButton.addEventListener( 'click', function( event ) {
	copyTextToClipboard( copyUrl.innerHTML );
} );
