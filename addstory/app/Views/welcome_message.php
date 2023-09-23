<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Clone</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>   
    <aside class="sidebar">        
        <div class="profile">
            <img src="/img/instagram.png" alt="IG Logo">            
        </div>
        <nav>
            <ul>
            <li class="nav-item">
            <a href="#">
                <img src="/img/home.png" alt="Home Logo" class="nav-icon">
                <span class="nav-text">Home</span>
</a>
            </li>           
            </ul>
        </nav>
    </aside>
   
    <main>
   
</main>



    <div class="right-user-profile">
    <div class="container">
        <div class="user-img-container">
            <img src="/img/default.svg" alt="User Logo" class="user-img">
        </div>
        <div class="user-text">
        <p class="username">apolo.6</p>
            <div class="user-info">
                <span class="full-name">Mr. Apolo</span>
                <a href="#" class="switch-link">Switch</a>
            </div>
        
        </div>
        <button id="openModalButton" class="create_post">
            Create new post
        </button>
    </div>
</div>   

<div id="postModal" class="modal">
    <button id="closeModalButton" class="close-button">&times;</button>    
    <div class="modal-content">  
    <div class="modal-title">
                Create new post
    </div>    
        <hr class="title-line">
        <br>
        <br>
        <div id="dropArea" class="drop-area">
            <img src="/img/image.png" alt="gallery" style="width: 96px; height: 77px;">            
            <p>Drag photos here</p>
            <input type="file" id="uploadFile" accept="image/*" multiple style="display: none;">
        </div>                  
        <div class="button-container">
            <button id="selectFromComputer">Select from computer</button>
        </div>        
    </div>
</div>

<div id="postModalCaption" class="modal">    
    <button id="cancel_cross" class="close-button">&times;</button>
    <div class="modal-content-story">  
        <div class="header">
            <img src="/img/arrow_back.svg" alt="arrow back" class="back-arrow" id="cancel">
            <div class="modal-title">
                Create new post
            </div>
            <p class="share-text" id="share_story">Share</p>            
        </div>
        <hr class="title-line">       
        <div class="form-row">
            <div class="form-element">
            <img id="selectedImage" src="#" alt="Selected Image" style="width: 365px; height: 365px;">
            </div>
            <div class="form-element">
            <div class="caption-input-container">
                <div class="useraccount-position">
                    <div class="user-img-story">
                        <img src="/img/default.svg" alt="User Logo" class="user-img">
                    </div>
                    <p class="username">apolo.6</p>
                </div>
                <textarea id="captionInput" class="captionText" placeholder="Write a caption..."></textarea>                
                
            </div>            
            <div id="charCount" class="char-count">0/2,200</div>
            </div>
        </div>                  
    </div>
</div>


<div id="discardModal" class="modal" style="display: none;">
<button id="cancelCrossDiscardButton" class="close-button">&times;</button>
    <div class="modal-content-discard">
        <p class="discard-text">Discard a post?</p>
        <p class="discard-info">If you leave, your edits won't be saved.</p>
        <hr class="discard-divider">
        <p class="discard-button" id="discardButton">Discard</p>
        <hr class="discard-divider">
        <p class="cancel-discard-button" id="cancelDiscardButton">Cancel</p>
    </div>
</div>

<div id="postSharedModal" class="modal" style="display: none;">
    <button id="closeModalButtonShared" class="close-button">&times;</button>
    <div class="modal-content-shared">       
        <div class="modal-title">
            Post Shared
            <hr class="title-line">
        </div>
        <br>
        <br>
        <br>       
        <img src="/img/ig_logo_checklist.png" alt="checklist_logo" style="width: 96px; height: 96px;">  
        <p class="notification-text">Your post has been shared</p>
    </div>
</div>


    <footer class="right-footer">
        <div class="container">
        <p class="footer-text">&copy; 2023 Instagram Clone</p>
        </div>
    </footer>
   <script>  
function toggleLike(button) {
    const likeButton = button.querySelector('.like-button');
    
    if (likeButton.src.includes('heart_clicked.png')) {
        likeButton.src = '/img/heart.png';
    } else {
        likeButton.src = '/img/heart_clicked.png';
    }
    button.classList.toggle('clicked');
   
    setTimeout(() => {
        button.classList.remove('clicked');
    }, 200);
}

const shareButton = document.getElementById('share_story');
shareButton.addEventListener('click', () => {                 
    postModalCaption.style.display = 'none';
    createNewPost();
});

function createNewPost() {        
    const captionText = captionInput.value;

    const imageSource = selectedImage.src;

    const postContainer = document.createElement('div');
    postContainer.classList.add('container');
    
    const userTextName = document.createElement('div');
    userTextName.classList.add('user-text-name');

    const userImgShape = document.createElement('div');
    userImgShape.classList.add('user-img-shape');

    const userImg = document.createElement('img');
    userImg.src = '/img/default.svg';
    userImg.alt = 'User Logo';
    userImg.classList.add('user-img');

    userImgShape.appendChild(userImg);

    const username = document.createElement('p');
    username.classList.add('username');
    
    function updateFormattedTime() {
    const currentTime = new Date();
    const timeDifference = Math.floor((currentTime - startTime) / 1000);

    if (timeDifference < 60) {      
        formattedTime = `${timeDifference} second${timeDifference > 1 ? 's' : ''} ago`;
    } else if (timeDifference < 3600) {      
        const minutesAgo = Math.floor(timeDifference / 60);
        formattedTime = `${minutesAgo} minute${minutesAgo > 1 ? 's' : ''} ago`;
    } else if (timeDifference < 86400) {       
        const hoursAgo = Math.floor(timeDifference / 3600);
        formattedTime = `${hoursAgo} hour${hoursAgo > 1 ? 's' : ''} ago`;
    } else if (timeDifference < 604800) { 
        const daysAgo = Math.floor(timeDifference / 86400);
        formattedTime = `${daysAgo} day${daysAgo > 1 ? 's' : ''} ago`;
    } else {
        const weeksAgo = Math.floor(timeDifference / 604800);
        formattedTime = `${weeksAgo} week${weeksAgo > 1 ? 's' : ''} ago`;
    }
   
    username.innerHTML = `apolo.6 <span class="muted-dot">•</span> ${formattedTime}`;
}

let formattedTime = 'a few seconds ago';
const startTime = new Date();

updateFormattedTime();

setInterval(updateFormattedTime, 1000);

    userTextName.appendChild(userImgShape);
    userTextName.appendChild(username);

    const post = document.createElement('div');
    post.classList.add('post');

    const postImage = document.createElement('img');
    postImage.src = imageSource;
    postImage.alt = 'Post Image';
    postImage.classList.add('post-image');
    postImage.style.width = '468px';
    postImage.style.height = '468px';
    post.appendChild(postImage);

    const likeButton = document.createElement('button');
    likeButton.classList.add('like-button');
    likeButton.onclick = toggleLike;
    likeButton.setAttribute('onclick', 'toggleLike(this)');

    const likeImage = document.createElement('img');
    likeImage.src = '/img/heart.png';
    likeImage.alt = 'Like';
    likeImage.classList.add('like-button');

    likeButton.appendChild(likeImage);

    const caption = document.createElement('div');
    caption.classList.add('caption');
    if (captionText !== '') {
    caption.innerHTML = '<b>apolo.6</b> ' + captionText;
    }
    caption.style.maxWidth = '468px';
    caption.style.wordWrap = 'break-word';

    const hrElement = document.createElement('hr');
    hrElement.style.width = '468px';    
    hrElement.style.marginLeft = '46px';

    postContainer.appendChild(userTextName);
    postContainer.appendChild(post);
    postContainer.appendChild(likeButton);
    postContainer.appendChild(caption);
    
    postContainer.appendChild(hrElement);
    const mainContent = document.querySelector('main');
    mainContent.insertBefore(postContainer, mainContent.firstChild);
    captionInput.value = '';    
    selectedImage.src = "";
    charCount.textContent = '0/2,200';
    showPostSharedModal();
}

function showPostSharedModal() {   
    postSharedModal.style.display = 'block';
}

const postModal = document.getElementById('postModal');
const postModalCaption = document.getElementById('postModalCaption');
const postSharedModal = document.getElementById('postSharedModal');
const openModalButton = document.getElementById('openModalButton');
const closeModalButton = document.getElementById('closeModalButton');
const closeModalButtonShared = document.getElementById('closeModalButtonShared');
const selectedImage = document.getElementById('selectedImage');
const captionInput = document.getElementById('captionInput');
const discardModal = document.getElementById('discardModal');
const discardButton = document.getElementById('discardButton');
const cancelDiscardButton = document.getElementById('cancelDiscardButton');
const cancelCrossDiscardButton = document.getElementById('cancelCrossDiscardButton');
const selectButton = document.getElementById('selectFromComputer');
const cancel = document.getElementById('cancel');
const cancel_cross = document.getElementById('cancel_cross');

const charCount = document.getElementById('charCount');

captionInput.addEventListener('input', function () {
  const maxLength = 2200;
  if (this.value.length > maxLength) {
    this.value = this.value.slice(0, maxLength);
  }

  charCount.textContent = `${this.value.length.toLocaleString()}/${maxLength.toLocaleString()}`;
});

function openModal() {
    postModal.style.display = 'block';
}


openModalButton.addEventListener('click', openModal);
closeModalButton.addEventListener('click', () => {   
    postModal.style.display = 'none';    
});

closeModalButtonShared.addEventListener('click', () => {   
    postSharedModal.style.display = 'none';
});
cancel.addEventListener('click', () => {   
    discardModal.style.display = 'block';
});

cancel_cross.addEventListener('click', () => {   
    discardModal.style.display = 'block';
});

discardButton.addEventListener('click', () => {  
    discardModal.style.display = 'none';
    postModalCaption.style.display = 'none';
    postModal.style.display = 'block';        
    selectedImage.src = "";
    captionInput.value = '';      
    charCount.textContent = '0/2,200';
});

cancelDiscardButton.addEventListener('click', () => {   
    discardModal.style.display = 'none';
});

cancelCrossDiscardButton.addEventListener('click', () => {   
    discardModal.style.display = 'none';
});

const dropArea = document.getElementById('dropArea');

dropArea.addEventListener('dragenter', preventDefaults, false);
dropArea.addEventListener('dragover', preventDefaults, false);
dropArea.addEventListener('dragleave', preventDefaults, false);

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

dropArea.addEventListener('drop', function (e) {
    e.preventDefault();
    const dt = e.dataTransfer;
    const files = dt.files;

    handleFiles(files);
});

function handleFiles(files) {
    for (const file of files) {
        if (file.type.startsWith('image/')) {     
            const reader = new FileReader();
            reader.onload = function (event) {            
                const selectButton = document.getElementById('selectFromComputer');
                if (selectButton) {                                      
                    selectedImage.src = event.target.result;                                          
                    postModalCaption.style.display = 'block';
                    postModal.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);
        }
    }
}

const fileInput = document.getElementById('uploadFile');

selectButton.addEventListener('click', () => {
    fileInput.click();
});

function displaySelectedImage(file) {
    const reader = new FileReader();

    reader.onload = function(event) {
        selectedImage.src = event.target.result;  
        postModalCaption.style.display = 'block';
        postModal.style.display = 'none';              
    };

    reader.readAsDataURL(file);
}

fileInput.addEventListener('change', function() {
    const files = this.files;

    if (files.length > 0) {
        const file = files[0];
        displaySelectedImage(file);
    }
});
</script>
</body>
</html>
