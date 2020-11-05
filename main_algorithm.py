import pandas as pd
import numpy as np
from sklearn import svm
from sklearn.model_selection import cross_val_score, train_test_split
from sklearn.preprocessing import StandardScaler, OneHotEncoder
from sklearn.impute import SimpleImputer
from sklearn.pipeline import Pipeline
from sklearn.tree import DecisionTreeClassifier
import matplotlib.pyplot as plt
from sklearn.svm import LinearSVC
from sklearn.decomposition import PCA
import pylab as pl
from itertools import cycle
from sklearn.svm import SVC

import sys

dataset = np.genfromtxt('processed.cleveland.data.csv', dtype=float, delimiter=',', invalid_raise=False, usemask=False, filling_values=0.0, )

X = dataset[:, 0:12]
y = dataset[:, 13]

# Replacing 1-4 by 1 label
for index, item in enumerate(y):
    if not (item == 0.0):
        y[index] = 1

options_for_plot = ['0', '1']


# The specific method is to plot the data in 2 dimensions
def PlotFunctionData(data, target, options_for_plot):
    select_colors = cycle('rgbcmykw')
    target_ids = range(len(options_for_plot))
    plt.figure()
    for i, c, label in zip(target_ids, select_colors, options_for_plot):
        plt.scatter(data[target == i, 0], data[target == i, 1],
                    c=c, label=label)
    plt.legend()
    plt.plot()
    plt.show()
    

modelSVM = LinearSVC(C=0.001)
pca_var = PCA(n_components=2, whiten=True).fit(X)
X_new = pca_var.transform(X)

# calling PlotFunctionData in case someone want to see the diagram and the performance of the algorithm
#PlotFunctionData(X_new, y, options_for_plot)

class Predict:
    def __init__(self):
        self.X = []
        self.Y = []
    #declare Num as the Result in our Database
    def CleaningFunctionForData(self, dataset):
        headers_of_the_data = ['Age', 'Gender', 'Chest_Pain', 'Resting_Blood_Pressure', 'Serum_Cholestrol',
                      'Fasting_Blood_Sugar', 'Resting_ECG', 'Max_Heart_Rate',
                      'Exercise_Induced_Angina', 'OldPeak',
                      'Slope', 'CA', 'Thal', 'Num']
        dataset_form = pd.read_csv(dataset, names=headers_of_the_data)
        dataset_form = dataset_form.replace('[?]', np.nan, regex=True)
        dataset_form = pd.DataFrame(SimpleImputer(missing_values=np.nan, strategy='mean')
                          .fit_transform(dataset_form), columns=headers_of_the_data)
        dataset_form = dataset_form.astype(float)
        return dataset_form

    def DatasetSplit(self, dataset_form):
        self.Y = dataset_form['Num'].apply(lambda x: 1 if x > 0 else 0)
        self.X = dataset_form.drop('Num', axis=1)

    def PipelineForWorkFlow(self):
        estimators = []
        estimators.append(('standardize', StandardScaler()))
        estimators.append(('tree', svm.SVC()))
        model = Pipeline(estimators)
        return model

    def CrossValidation(self, clf, cv=5):
        calculated_scores_from_iterations = cross_val_score(clf, self.X, self.Y, cv=cv, scoring='f1')
        score = calculated_scores_from_iterations.mean()

    def CheckScoreFitting(self, clf, label='x'):
        clf.fit(self.X, self.Y)
        score_fitting = clf.score(self.X, self.Y)

    def ValueFromPredictionProcess(self, clf, sample):
        y = clf.predict([sample])
        return y[0]

    def MainFunctionOfPredictionProcess(self, sample, dataset_path='processed.cleveland.data.csv'):
        data = self.CleaningFunctionForData(dataset_path)
        self.DatasetSplit(data)
        self.model = self.PipelineForWorkFlow()
        self.CheckScoreFitting(self.model, label='SVM')
        self.CrossValidation(self.model, 10)
        return self.ValueFromPredictionProcess(self.model, sample)

#Data in order to test that patient HAS heart disease (test sample)
#46.0, 1.0, 4.0, 140.0, 311.0, 0.0, 0.0, 120.0, 1.0, 1.8, 2.0, 2.0, 7.0

#Data in order to test that patient HAS NOT heart disease (test sample)
#37.0, 1.0, 3.0, 130.0, 250.0, 0.0, 0.0, 187.0, 0.0, 3.5, 3.0, 0.0, 3.0, 0


if __name__ == '__main__':
    age = sys.argv[1]
    sex = sys.argv[2]
    cp = sys.argv[3]
    trestbps = sys.argv[4]
    chol = sys.argv[5]
    fbs = sys.argv[6]
    restecg = sys.argv[7]
    thalach = sys.argv[8]
    exang = sys.argv[9]
    oldpeak = sys.argv[10]
    slope = sys.argv[11]
    ca = sys.argv[12]
    thal = sys.argv[13]
    
    sample = [age,sex,cp,trestbps,chol,fbs,restecg,thalach,exang,oldpeak,slope,ca,thal]
    p = Predict()
    print("Prediction value: {}".format(p.MainFunctionOfPredictionProcess(sample)))
    if p.MainFunctionOfPredictionProcess(sample) == 1:
        print("The patient has the probability to appear heart disease")
    else:
        print("The patient has NOT the probability to appear heart disease")