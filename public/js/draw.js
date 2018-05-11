const apply = async ({
                       effectQuery,
                       effectW_Mult = 1, effectH_Mult = 1,
                       effectCenter,
                       effectOffsetX = .5, effectOffsetY = .5
                     }) => {

  const loadImage = async src => {
    const image = new Image();
    image.src = src;
    await new Promise(res => image.onload = () => res());
    return image
  };

  const angle = (p1, p2) => Math.atan2(p2.y - p1.y, p2.x - p1.x);

  const pointsToFeatures = (rect, pts) => {
    const [x, y, w, h] = rect;
    const cx = (x + w / 2);
    const cy = (y + h / 2);

    const getPts = idx => ({
      x: pts[idx * 2 + 0] * w / 2 + cx,
      y: pts[idx * 2 + 1] * h / 2 + cy
    });

    const eyes = [getPts(0), getPts(1)];

    const nose = getPts(10);

    const lowerLip = getPts(13);

    const mustache = { x: (nose.x + lowerLip.x) / 2, y: (nose.y + lowerLip.y) / 2 };

    const center = { x: cx, y: cy };

    return { eyes, nose, lowerLip, mustache, center };
  };

  const imageUrl = window.imageUrl;
  const { faces, results: points } = window.imagePoints;

  const targetElement = document.querySelector('.picture-holder');
  [...targetElement.children].forEach(child => targetElement.removeChild(child));

  const effect = await loadImage(document.querySelector(effectQuery).src);
  const image = await loadImage(imageUrl);

  const { height, width } = image;

  const canvas = document.createElement('canvas');
  canvas.width = width;
  canvas.height = height;
  const ctx = canvas.getContext('2d');

  ctx.drawImage(image, 0, 0);

  faces.forEach(([x, y, w, h], index) => {

    const features = pointsToFeatures([x, y, w, h], points[index]);
    const center = effectCenter(features);

    const outW = w * effectW_Mult;
    const outH = effect.height / effect.width * h * effectH_Mult;

    ctx.drawImage(effect,
      0, 0, effect.width, effect.height,
      center.x - outW * effectOffsetX, center.y - outH * effectOffsetY, outW, outH
    );
  });

  targetElement.appendChild(canvas);
};


[
  {
    effectQuery: '.effects > div:nth-child(1) > img',
    effectCenter: features => ({
      x: (features.eyes[0].x + features.eyes[1].x) / 2,
      y: (features.eyes[0].y + features.eyes[1].y) / 2
    }),
    effectH_Mult: 1.7, effectW_Mult: 1.7,
    effectOffsetX: .5, effectOffsetY: .65
  },
  {
    effectQuery: '.effects > div:nth-child(2) > img',
    effectCenter: features => ({
      x: (features.eyes[0].x + features.eyes[1].x) / 2,
      y: (features.eyes[0].y + features.eyes[1].y) / 2
    }),
    effectH_Mult: 1, effectW_Mult: 1,
    effectOffsetX: .5, effectOffsetY: .5
  },
  {
    effectQuery: '.effects > div:nth-child(3) > img',
    effectCenter: features => ({
      x: (features.eyes[0].x + features.eyes[1].x) / 2,
      y: (features.eyes[0].y + features.eyes[1].y) / 2
    }),
    effectH_Mult: 1.5, effectW_Mult: 1.5,
    effectOffsetX: .5, effectOffsetY: .57
  },
  {
    effectQuery: '.effects > div:nth-child(4) > img',
    effectCenter: features => features.nose,
    effectH_Mult: 1.5, effectW_Mult: 1.5,
    effectOffsetX: .5, effectOffsetY: .73
  },
  {
    effectQuery: '.effects > div:nth-child(5) > img',
    effectCenter: features => ({
      x: (features.eyes[0].x + features.eyes[1].x) / 2,
      y: (features.eyes[0].y + features.eyes[1].y) / 2
    }),
    effectH_Mult: 0.9, effectW_Mult: 0.9,
    effectOffsetX: .5, effectOffsetY: .47
  },
  {
    effectQuery: '.effects > div:nth-child(6) > img',
    effectCenter: features => ({
      x: (features.eyes[0].x + features.eyes[1].x) / 2,
      y: (features.eyes[0].y + features.eyes[1].y) / 2
    }),
    effectH_Mult: 1, effectW_Mult: 1,
    effectOffsetX: .5, effectOffsetY: .36
  },
  {
    effectQuery: '.effects > div:nth-child(7) > img',
    effectCenter: features => ({
      x: (features.eyes[0].x + features.eyes[1].x) / 2,
      y: (features.eyes[0].y + features.eyes[1].y) / 2
    }),
    effectH_Mult: .9, effectW_Mult: .9,
    effectOffsetX: .5, effectOffsetY: .48
  },
  {
    effectQuery: '.effects > div:nth-child(8) > img',
    effectCenter: features => features.mustache,
    effectH_Mult: .7, effectW_Mult: .7,
    effectOffsetX: .5, effectOffsetY: .5
  },
  {
    effectQuery: '.effects > div:nth-child(9) > img',
    effectCenter: features => features.nose,
    effectH_Mult: .25, effectW_Mult: .25,
    effectOffsetX: .5, effectOffsetY: .5
  },
  {
    effectQuery: '.effects > div:nth-child(10) > img',
    effectCenter: features => ({
      x: (features.eyes[0].x + features.eyes[1].x) / 2,
      y: (features.eyes[0].y + features.eyes[1].y) / 2
    }),
    effectH_Mult: 0.9, effectW_Mult: 0.9,
    effectOffsetX: .5, effectOffsetY: .5
  },
  {
    effectQuery: '.effects > div:nth-child(11) > img',
    effectCenter: features => features.center,
    effectH_Mult: 1.5, effectW_Mult: 1.5,
    effectOffsetX: .5, effectOffsetY: .55
  }
].forEach(opts => {
  document.querySelector(opts.effectQuery).parentElement.onclick = () => {
    apply(opts).catch(console.error);
  }
});

function downloadCanvas(link, canvas, filename) {
    link.href = canvas.toDataURL();
    link.download = filename;
}
document.getElementById('download-btn').addEventListener('click', function() {
    downloadCanvas(this, document.querySelector('canvas'), 'image.png');
}, false);