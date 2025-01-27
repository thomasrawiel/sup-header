class GenerateHtml {
    constructor() {
        this.addEventListener();
    }
    addEventListener() {
        document.querySelectorAll('.sup-header-btn').forEach((button) => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                let dropdown = this.createDropdown(button);

                e.target.closest('.btn-group').style.position = 'relative';
                e.target.closest('.btn-group').appendChild(dropdown);

                dropdown.style.position = 'absolute';
                dropdown.style.right = 0;
                dropdown.style.top = 0;

                const closeListener = (event) => {
                    if (!dropdown.contains(event.target)) {
                        dropdown.remove();
                        document.removeEventListener('click', closeListener);
                    }
                };
                // Hide the dropdown when clicking elsewhere
                document.addEventListener('click', closeListener);
            });
        });
    }
    createDropdown(button) {
        let dropdown = document.createElement('div');
        dropdown.className = 'dropdown-menu show';

        let tags = button.getAttribute('data-allowed-tags').split(',');
        tags.forEach(tag => {
            let option = document.createElement('div');
            option.className = 'dropdown-item';
            if (TYPO3.lang['supheader.label.' + tag]) {
                option.textContent = TYPO3.lang['supheader.label.' + tag];
            } else {
                option.textContent = tag;
            }
            option.textContent += ` <${tag}>`
            option.style.cursor = 'pointer';
            option.addEventListener('click', () => {
                this.applyTag(tag, button.getAttribute('data-field-name'));
                dropdown.remove();
            });
            dropdown.appendChild(option);
        });

        return dropdown;
    }

    applyTag(tag, fieldName) {
        // Get the button's associated field
        let field = document.querySelector('[data-formengine-input-name="' + fieldName + '"]');
        field.focus();

        // Get the current selection in the input field
        let start = field.selectionStart;
        let end = field.selectionEnd;
        let value = field.value;

        if (start !== end) {
            // Wrap the selected text with the chosen tag
            let selectedText = value.substring(start, end);
            field.value = value.substring(0, start) + `<${tag}>` + selectedText + `</${tag}>` + value.substring(end);
        } else {
            // Insert the chosen tag at the cursor position
            if (tag === 'br') {
                // Special handling for <br> as it is self-closing
                field.value = value.substring(0, start) + `<${tag}>` + value.substring(start);
                field.selectionStart = field.selectionEnd = start + tag.length + 2; // Position after <br>
            } else {
                field.value = value.substring(0, start) + `<${tag}></${tag}>` + value.substring(start);
                field.selectionStart = field.selectionEnd = start + tag.length + 2; // Position inside the opening tag
            }
        }
    }
}
export default new GenerateHtml();