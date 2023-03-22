"use strict";

$(function () {
  //modalリセット
  $("#modal-trigger").click(function () {
    $(".textInput").val("");
    $(".areaInput").val("");
    $("label").find("i").removeClass("checkcircle-color-checked");
    $("label").parent().removeClass("testbox-checked");

    $(".tweetButton").find("i").removeClass("checkcircle-color-checked");

    $(".completeContainer").hide();
    $(".modalLeft").show();
    $(".modalRight").show();
    $(".modalPost").show();
    //tweetボタンリセット
    $("#tweetBox").prop("checked", false);
    //loadingリセット
    $(".loadingContainer").show();
    $(".completeIconWrapper").hide();
    $(".completeText").hide();
  });
  $("#modal-trigger2").click(function () {
    $(".textInput").val("");
    $(".areaInput").val("");
    $("label").find("i").removeClass("checkcircle-color-checked");
    $("label").parent().removeClass("testbox-checked");

    $(".tweetButton").find("i").removeClass("checkcircle-color-checked");

    $(".completeContainer").hide();
    $(".modalLeft").show();
    $(".modalRight").show();
    $(".modalPost").show();
    //tweetボタンリセット
    $("#tweetBox").prop("checked", false);
    //loadingリセット
    $(".loadingContainer").show();
    $(".completeIconWrapper").hide();
    $(".completeText").hide();
  });
  //tweetボタン
  $(".tweetButton").click(function () {
    $(this).find("i").toggleClass("checkcircle-color-checked");
  });
  $("label").click(function () {
    $(this).find("i").toggleClass("checkcircle-color-checked");
    $(this).parent().toggleClass("testbox-checked");
  });
  //modal 投稿
  $(".modalPost").click(function () {
    var tweetText = $("#tweetText").val();
    if ($("#tweetBox").prop("checked") == true) {
      window.open("https://twitter.com/share?text=" + tweetText);
    }

    let w = $(".modalWindow").width();
    let h = $(".modalWindow").height();
    $(".modalLeft").hide();
    $(".modalRight").hide();
    // $('.completeContainer').show();
    $(this).hide();
    loading();

    $(".modalWindow").width(w);
    $(".modalWindow").height(h);
  });

  function loading() {
    $(".completeContainer").show();
    setTimeout(function () {
      $(".loadingContainer").hide();
      $(".completeIconWrapper").fadeIn();
      $(".completeText").fadeIn();
    }, 2000);
  }

  //flat-pickr
  // flatpickr("#study-date");

  // グラフ
  // Load Charts and the corechart package.
  google.charts.load("current", { packages: ["corechart"] });

  // Draw the chart when Charts is loaded.
  google.charts.setOnLoadCallback(learningContentsChart); //学習言語
  google.charts.setOnLoadCallback(learningLangageChart); //学習コンテンツ
  google.charts.setOnLoadCallback(learningTimeChart); //棒グラフ

  // Callback that draws the chart.
  //学習コンテンツ
  let contentsArray = [["コンテンツ", "割合"]]; 
  for(let i=0; i < contents_data.length; i++) {
    contentsArray.push([contents_data[i].content, Number(contents_data[i].hour)]);
  }

  function learningContentsChart() {
    // Create the data table
    let data = google.visualization.arrayToDataTable(contentsArray)

    // Set options for chart.
    let options = {
      pieHole: 0.5,
      pieSliceBorderColor: "none",
      colors: ["#2245EC", "#2371BD", "#39BDDE"],
      chartArea: { width: "90%", height: "90%", backgroundColor: "#000" },
      legend: { position: "none" },
    };

    // Instantiate and draw the chart.
    let chart = new google.visualization.PieChart(
      document.getElementById("contents-chart")
    );
    chart.draw(data, options);
  }

  //学習言語
  let languagesArray = [["言語", "割合"]]; 
  for(let i=0; i < languages_data.length; i++) {
    languagesArray.push([languages_data[i].language, Number(languages_data[i].hour)]);
  }

  function learningLangageChart() {
    // Create the data table
    let data = google.visualization.arrayToDataTable(languagesArray)

    // Set options for chart.
    let options = {
      pieHole: 0.5,
      pieSliceBorderColor: "none",
      colors: [
        "#2245EC",
        "#2371BD",
        "#39BDDE",
        "#40CEFE",
        "#B29FF3",
        "#6D46EC",
        "#4A17EF",
        "#3105C0",
      ],
      chartArea: { width: "90%", height: "90%", backgroundColor: "#000" },
      legend: { position: "none" },
    };

    // Instantiate and draw the chart.
    let chart = new google.visualization.PieChart(
      document.getElementById("lang-chart")
    );
    chart.draw(data, options);
  }

  //棒グラフ
  //今月の日数
  function daysInThisMonth() {
    let now = new Date();
    return new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();
  }

  function learningTimeChart() {
    //配列準備
    //行の配列
    var arr = new Array(daysInThisMonth());
    //列の配列  2列 & 初期データ挿入
    for (let i = 0; i < arr.length; i++) {
      arr[i] = new Array(2);
      arr[i][0] = i + 1;
      arr[i][1] = 0;
    }
    //データ読み込み
    //準備した配列にデータを格納
    for (let i = 0; i < daysInThisMonth(); i++) {
      for (let j = 0; j < bar_data.length; j++) {
        if (i + 1 === bar_data[j].day) {
          arr[i][1] = Number(bar_data[j].hour);
          break;
        }
      }
    }

    // Create the data table
    let data = new google.visualization.arrayToDataTable([
      ["day", "time"],
      ...arr,
    ]);

    // Set options for chart.
    let options = {
      chartArea: { width: "80%", height: "80%" },
      legend: { position: "none" },
      hAxis: {
        textStyle: { color: "#97b9d1" },
        ticks: [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30],
        gridlines: { color: "none" },
        baseline: "none",
      },
      vAxis: {
        textStyle: { color: "#97b9d1" },
        ticks: [0, 2, 4, 6, 8],
        gridlines: { color: "none" },
        baseline: "none",
        format: "#h",
      },
    };

    // Instantiate and draw the chart.
    let chart = new google.visualization.ColumnChart(
      document.getElementById("time-graph")
    );
    chart.draw(data, options);
  }
});